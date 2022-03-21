<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'line_1' => 'required|max:255',
            'line_2' => 'required|max:255',
            'district' => 'required|max:255',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'required|max:6'
        ];
    }
}
