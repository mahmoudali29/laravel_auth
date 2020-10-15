<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliders extends FormRequest
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
        $rules = [
            'title1' => 'required|max:255',
            'title2' => 'required',
            'description' => 'required',
            'link' => 'required|active_url',
            'image' => 'mimes:jpeg,bmp,png',
        ];

        return $rules;
    }
}
