<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicMixedRequest;
use App\Models\Address;
use App\Models\Clinic;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::paginate(10);

        return view('clinic.index',  compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weekdays = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
        $countries = Country::pluck('name','id')->all();
        $hours = hoursRange(0, 86400, 60 * 15);
        // $countries = populateLists($listItems, [174, 175]);

        return view('clinic.create', compact('countries', 'weekdays', 'hours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicMixedRequest $request)
    {
        $logo = $request->file('logo');

        $address = Address::create([
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'district' => $request->district,
            'city_id' => $request->city,
            'country_id' => $request->country,
            'postal_code' => $request->postal_code,
            'location' => ''
        ]);

        $clinic = new Clinic();
        $clinic->user_id = Auth::id();
        $clinic->name = $request->name;
        $clinic->phone = $request->phone;
        $clinic->email = $request->email;
        $clinic->prc = $request->prc;
        $clinic->prt = $request->prt;
        $clinic->s2 = $request->s2;
        $clinic->operations = $request->operations;
        $clinic->address_id = $address->id;

        if($logo) {
            $path = $request->file('logo')->storeAs(
                'logo',
                Str::random(8) . '-' . Auth::id() . '.' . $logo->getClientOriginalExtension()
            );
            $clinic->logo = $path;
        }
        $clinic->save();

        return redirect()->route('clinics')
                        ->with('success','Clinic created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clinic = Clinic::find($id);

        return view('clinic.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weekdays = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
        $countries = Country::pluck('name','id')->all();
        $hours = hoursRange(0, 86400, 60 * 15);
        // $countries = populateLists($listItems, [174, 175]);

        $clinic = Clinic::find($id);

        return view('clinic.edit', compact('clinic', 'countries', 'weekdays', 'hours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logo = $request->file('logo');

        $clinic = Clinic::find($id);
        $clinic->name = $request->name;
        $clinic->phone = $request->phone;
        $clinic->email = $request->email;
        $clinic->prc = $request->prc;
        $clinic->prt = $request->prt;
        $clinic->s2 = $request->s2;
        $clinic->operations = $request->operations;
        if($logo) {
            $path = $request->file('logo')->storeAs(
                'logo',
                Str::random(8) . '-' . Auth::id() . '.' . $logo->getClientOriginalExtension()
            );
            $clinic->logo = $path;
        }
        $clinic->update();

        $address = Address::find($clinic->address->id);
        $address->line_1 = $request->line_1;
        $address->line_2 = $request->line_2;
        $address->district = $request->district;
        $address->postal_code = $request->postal_code;
        $address->country_id = $request->country;
        $address->city_id = $request->city;
        $address->location = '';
        $address->update();

        return redirect()->route('clinics')
            ->with('success','Clinic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic = Clinic::find($id);

        $address = Address::find($clinic->address->id);
        $address->delete();

        $clinic->delete();

        return redirect()->route('clinics')
                        ->with('success','Clinic deleted successfully');
    }
}
