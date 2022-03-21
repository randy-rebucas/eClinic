<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\Address;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($id);
        if ($request->new_password) {
            try {
                // compare password
                Hash::check($request->prev_password, $user->password);
                // The passwords match...
                $user->password = Hash::make($request->new_password);

            } catch (Throwable $e) {
                report($e);

                return false;
            }
        }
        $user->name = $request->name;
        $user->update();

        $address = Address::find($user->profile->address->id);
        $address->line_1 = $request->line_1;
        $address->line_2 = $request->line_2;
        $address->district = $request->district;
        $address->postal_code = $request->postal_code;
        $address->country_id = $request->country;
        $address->city_id = $request->city;
        $address->location = '';
        $address->update();

        $profile = Profile::find($user->profile->id);
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->mi = $request->mi;
        $profile->gender = $request->gender;
        $profile->address_id = $address->id;
        $profile->dob = $request->dob;
        $profile->mobile = $request->mobile;
        $profile->update();

        return redirect()->route('settings')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
