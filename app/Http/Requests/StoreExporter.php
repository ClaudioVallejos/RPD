<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExporter extends FormRequest
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
            'phone' => 'required|max:8',
            'rut' => 'required|max:10|cl_rut',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Falta el rut del exportador',
            'phone.required' => 'Falta el numero de contacto',
            'rut.cl_rut' => 'rut invakudi o falta rellenar el campo',
            
        ];
    }
}
