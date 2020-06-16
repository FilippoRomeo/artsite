<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class imageStorage extends FormRequest
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
            'title' => 'required|max:100',
            'file' => 'required|image|max:2000',
            'created_by' => 'required|max:250',
            'description' => 'required|max:500',
            'location' => 'required|max:250',
            'manufacturing_period' => 'required|max:250',
            'manufacturing_type' => 'required|max:250',
            'manufacturing_date' => 'date|nullable'
        ];
    }
}