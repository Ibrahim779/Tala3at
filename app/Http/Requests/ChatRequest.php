<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
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
        return $this->isMethod('post') ?  $this->onCreate() :  $this->onUpdate();
    }

    protected function onUpdate()
    {
        return [
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'img'      => 'image'
        ];
    }

    protected function onCreate()
    {
        return [
            //
        ];
    }
}
