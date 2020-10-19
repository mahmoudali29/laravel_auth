<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventValidation extends FormRequest
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
            'topics' => 'required|max:255',
            'description' => 'required',
            'source_title' => 'required',
            'source_title_writer' => 'required',
            'host' => 'required',
            'location' => 'required',
            'website' => 'required|active_url',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
        return $rules;
    }
}
