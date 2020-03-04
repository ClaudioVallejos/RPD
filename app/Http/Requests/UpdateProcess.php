<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class UpdateProcess extends FormRequest
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
            'tarja_proceso' => 'required|max:10',
            'Box_out' => 'required|max:10',
            
        ];
    }

    public function messages(){
        return [
            'tarja_proceso.required' => 'Falta un campo obligatorio',
            'Box_out.required' => 'Falta un campo obligatorio',
            
        ];
    }
}
