<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class StoreFruit extends FormRequest
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
            'specie' => 'required|max:20',
        ];
    }

    public function messages(){
        return [
            'specie.required' => 'Debe ingresar el nombre de la fruta',
            ];
    }
}
