<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class StoreSeason extends FormRequest
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
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Falta un campo obligatorio',
            'start_date.required' => 'Falta un campo obligatorio',
            'end_date.required' => 'Falta un campo obligatorio',
        ];
    }
}
