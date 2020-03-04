<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class UpdateReception extends FormRequest
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
            'grossweight' => 'required|max:20',
            'provider_id' => 'required',
            'fruit_id' => 'required',
            'quality_id' => 'required',
            'season_id' => 'required',
            'supplies_id' => 'required',
            'status_id' => 'required',
            'netweight' => 'required|max:20',
            'tray_in' => 'required|max:10',
            'tray_out' => 'required|max:10',
            'name_driver' => 'required|max:120',
            'number_guide' => 'required|max:10',
            'comment' => 'required|max:120',
            'temperature' => 'required|max:2',
            'tarja' => 'required|max:20',


        ];
    }

    public function messages(){
        return [

            'grossweight.required' => 'Falta un campo obligatorio',
            'provider_id.required' => 'Debe seleccionar un proveedor',
            'fruit_id.required' => 'Debe seleccionar una fruta',
            'quality_id.required' => 'Debe seleccionar una calidad',
            'season_id.required' => 'Debe seleccionar una temporada',
            'status_id.required' => 'Debe ingresar un estatusfruit_id',
            'supplies_id' => 'Debe seleccionar un insumo',
            'netweight.required' => 'Falta un campo obligatorio',
            'tray_in.required' => 'Falta un campo obligatorio',
            'tray_out.required' => 'Falta un campo obligatorio',
            'name_driver.required' => 'Falta un campo obligatorio',
            'number_guide.required' => 'Falta un campo obligatorio',
            'comment.required' => 'Falta un campo obligatorio',
            'temperature.required' => 'Falta un campo obligatorio',
            'tarja.required' => 'Falta un campo obligatorio',
            
        ];
    }
}
