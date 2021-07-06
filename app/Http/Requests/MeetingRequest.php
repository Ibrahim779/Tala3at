<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            'title_ar' => 'required|min:5|max:255|string',
            'title_en' => 'required|min:5|max:255|string',
            'description_ar' => 'required|min:5|max:1000',
            'description_en' => 'required|min:5|max:1000',
            'img' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'date' => 'required',
            'time' => 'required',
            'attendance_count' => 'required',
            'category_id' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
