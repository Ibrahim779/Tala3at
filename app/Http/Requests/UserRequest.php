<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|string',
            'phone' => 'required|min:5|max:1000',
            'email' => 'required|email|unique:users',
            'avatar' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
