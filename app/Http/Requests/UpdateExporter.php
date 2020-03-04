<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class UpdateExporter extends FormRequest
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
            'name' => 'required|max:20',
            'patent' => 'required|max:6',
            
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Falta un campo obligatorio',
            'patent.required' => 'Falta un campo obligatorio',
            
        ];
    }
}
