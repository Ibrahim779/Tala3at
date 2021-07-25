<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'min:2|max:255|string',
            'phone' => 'min:5|max:1000',
            'email' => 'email|unique:users',
            'avatar' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000',
        ];
    }
}
