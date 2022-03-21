<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => '',
            'name' => 'required|max:255',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email|unique:clinics',
            'prc' => 'required|unique:clinics',
            'prt' => '',
            's2' => '',
            'operations' => 'required'
        ];
    }
}
