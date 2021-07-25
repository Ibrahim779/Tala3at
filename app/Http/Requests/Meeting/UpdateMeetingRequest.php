<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
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
            'title_ar' => 'min:5|max:255|string',
            'title_en' => 'min:5|max:255|string',
            'description_ar' => 'min:5|max:1000',
            'description_en' => 'min:5|max:1000',
            'img' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000',
        ];
    }
}
