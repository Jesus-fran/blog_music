<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubirRespuestaRequest extends FormRequest
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
            'id_comentario' => 'required|numeric',
            'respuesta' => 'required|min:4|max:2000',
        ];
    }


    
    public function messages(){
        return [
            'id_comentario.required' => 'El id del comentario es obligatorio',
            'id_comentario.numeric' => 'El id debe ser un dato numérico',
            'respuesta.required' => 'El campo respuesta es obligatorio.',
            'respuesta.min' => 'La respuesta debe contener almenos 4 caracteres',
            'respuesta.max' => 'La respuesta no debe tener más de 2000 caracteres',

        ];
    }
}
