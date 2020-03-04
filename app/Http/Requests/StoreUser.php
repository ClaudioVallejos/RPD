<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;


class StoreUser extends FormRequest
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
            'name' => 'required|max:40',
            'email' => 'required|min:9|max:10|cl_rut|unique:users',
            'password' => 'required|string|min:6',

        ];
    }

    public function messages(){
        return [
            'name.required' => 'El Nombre esta vacio.',
            'email.required' => 'Por favor, rellenar el Rut',
            'email.unique' => 'El rut ya esta en uso',
            'email.cl_rut' => 'No es valido'
        ];
    }
}

