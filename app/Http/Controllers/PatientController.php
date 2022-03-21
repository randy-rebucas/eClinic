<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\Profile;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['searchkey' => $request->input('searchkey')]);
        $searchString = session('searchkey') ? session('searchkey') : $request->input('searchkey');

        $patients = Patient::whereHas('user.profile', function ($query) use ($searchString){
            $query->where('firstname', 'like', '%'.$searchString.'%')->orWhere('lastname', 'like', '%'.$searchString.'%');
        })->paginate(10);


        return view('patient.index',  compact('patients', 'searchString'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = array(
            'male' => 'Male',
            'female' => 'Female'
        );
        $countries = Country::pluck('name','id')->all();
        // $countries = populateLists($listItems, [174, 175]);

        return view('patient.create', compact('countries', 'gender'));
    }

    /**
     * Featch cities base on country id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCities(Request $request)
    {
        $listItems = City::where('country_id', $request->country_id)->pluck('name','id')->all();
        $data['cities'] = populateLists($listItems, [5,34,40]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientCreateRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $address = Address::create([
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'district' => $request->district,
            'city_id' => $request->city,
            'country_id' => $request->country,
            'postal_code' => $request->postal_code,
            'location' => ''
        ]);

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->mi = $request->mi;
        $profile->gender = $request->gender;
        $profile->address_id = $address->id;
        $profile->dob = $request->dob;
        $profile->mobile = $request->mobile;
        $profile->save();

        $patient = new Patient;
        $patient->user_id = $user->id;
        $patient->save();

        return redirect()->route('patients')
                        ->with('success','Patient created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gender = array(
            'male' => 'Male',
            'female' => 'Female'
        );
        $countries = Country::pluck('name','id')->all();
        // $countries = populateLists($listItems, [174, 175]);

        $patient = Patient::find($id);
        return view('patient.edit', compact('countries', 'gender', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, $id)
    {

        $patient = Patient::find($id);

        $address = Address::find($patient->user->profile->address->id);
        $address->line_1 = $request->line_1;
        $address->line_2 = $request->line_2;
        $address->district = $request->district;
        $address->postal_code = $request->postal_code;
        $address->country_id = $request->country;
        $address->city_id = $request->city;
        $address->location = '';
        $address->update();

        $profile = Profile::find($patient->user->profile->id);
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->mi = $request->mi;
        $profile->gender = $request->gender;
        $profile->address_id = $address->id;
        $profile->dob = $request->dob;
        $profile->mobile = $request->mobile;
        $profile->update();

        return redirect()->route('patients')
            ->with('success','Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);

        $address = Address::find($patient->user->profile->address->id);
        $address->delete();

        $user = User::find($patient->user->id);
        $user->delete();


        return redirect()->route('patients')
                        ->with('success','Patient deleted successfully');
    }
}
