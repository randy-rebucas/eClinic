<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender = array(
            'male' => 'Male',
            'female' => 'Female'
        );
        $countries = Country::pluck('name','id')->all();

        $user = User::find(Auth::id());

        return view('setting.index',  compact('user', 'countries', 'gender'));
    }

}
