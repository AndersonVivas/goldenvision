<?php

namespace GoldenVision\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Gv_usuarioRequest extends FormRequest
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
            'tipo'=> 'required',        
            'us_cedula' => 'required|unique:gv_usuarios|ecuador:ci',
            'nombres' => 'required',
            'apellidos'=> 'required',
            'email'=> 'nullable|email', 
            'celular'=> 'nullable|numeric'         
        ];
        
    }
}
