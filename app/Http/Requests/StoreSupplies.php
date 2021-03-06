<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplies extends FormRequest
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
            'weight' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Falta un campo obligatorio',
            'weight.required' => 'Falta un campo obligatorio',
        ];
    }
}
