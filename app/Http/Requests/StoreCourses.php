<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourses extends FormRequest
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
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'required',
        ];
        return $rules;
    }

    public function messages(){
        
        $messages = [
            'name.required' => 'Please Enter Name',
            'name.unique' => 'Please choose diffrent name',
            'price.required' => 'Please Enter Price',
        ];

        return $messages;
    }
}
