<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class StoreProviders extends FormRequest
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
            'name' => 'required|max:120',
            'address' => 'required|max:120',
            'number_phone' => 'required|max:8',
            'rut' => 'required|max:10|cl_rut',

        ];
    }

    public function messages(){
        return [
            'name.required' => 'Falta un campo obligatorio',
            'address.required' => 'Falta un campo obligatorio',
            'rut.cl_rut' => 'Por favor, rellenar el Rut',
            'number_phone.required' => 'Falta un campo obligatorio',
           
        ];
    }
}
