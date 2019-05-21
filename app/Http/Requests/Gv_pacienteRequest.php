<?php

namespace GoldenVision\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Gv_pacienteRequest extends FormRequest
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
            'pa_nombres' => 'required',
            'pa_apellidos' => 'required',
            'pa_fechanac' => 'required',
            'pa_correo' => 'nullable|email',            
            'id_lo' => 'required',
            'pa_direccion' => 'required',
            'pa_ocupacion' => 'required',
            /*'pa_antecedentesf' => 'nulleable',
            'pa_enfamiliares' => 'nulleable',
            'pa_enpersonales' => 'nulleable', */
            
        ];
    }
}
