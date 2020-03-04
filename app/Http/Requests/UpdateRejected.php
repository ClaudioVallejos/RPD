<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class UpdateRejected extends FormRequest
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
            'reason' => 'required|max:20',
            'description' => 'required|max:120',
            
        ];
    }

    public function messages(){
        return [
            'reason.required' => 'Falta un campo obligatorio',
            'description.required' => 'Falta un campo obligatorio',
            
        ];
    }
}
