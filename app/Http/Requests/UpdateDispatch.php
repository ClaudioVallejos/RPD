<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class UpdateDispatch extends FormRequest
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
            'exporter_id' => 'required|max:20',
            'patentNo' => 'required|max:10',
            
        ];
    }

    public function messages(){
        return [
            'exporter_id.required' => 'Falta un campo obligatorio',
            'patentNo.required' => 'Falta un campo obligatorio',
            
        ];
    }
}
