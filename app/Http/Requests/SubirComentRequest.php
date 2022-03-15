<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubirComentRequest extends FormRequest
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
            'id_pub' => 'required|numeric',
            'comentario' => 'required|min:4|max:800',
           
        ];
    }

    public function messages(){
        return [
            'id_pub.required' => 'El id de la publicación es obligatorio',
            'id_pub.numeric' => 'El id debe ser un dato numérico',
            'comentario.required' => 'El campo comentario es obligatorio.',
            'comentario.min' => 'El comentario debe contener almenos 4 caracteres',
            'comentario.max' => 'El comentario no debe tener más de 800 caracteres',

        ];
    }
}
