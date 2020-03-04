<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariety extends FormRequest
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
            'variety' => 'required|max:20',
            'fruit_id' => 'required|max:20',
        ];
    }

    public function messages(){
        return [
            'variety.required' => 'Debe ingresar el nombre de la variedad',
            'fruit_id.required' => 'Debe seleccionar una fruta',
            ];
    }
}
