<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubirPublicRequest extends FormRequest
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
        // Música popular moderna|Música instrumental|Música regional
        return [
            'categoria' => ['required','min:10','max:25','regex:/^[CONCIERTOS|MUSICA\sPOPULAR\sMODERNA|MUSICA\sINSTRUMENTAL|MUSICA\sREGIONAL]+$/'],
            'titulo' => 'required|min:10|max:50',
            'editor_post' => 'required|min:10',
            'imagen_file' => 'required_without:imagen_url|image|mimes:png,jpg',
            'imagen_url' => 'required_without:imagen_file|url|nullable',
            'tags' => 'required|min:5|max:50',
        ];
    }

    public function messages(){
        return [
            'categoria.required' => 'El campo categoria es obligatorio',
            'categoria.min' => 'El campo categoria debe contener al menos 10 caracteres.',
            'categoria.max' => 'El campo categoria no debe contener más de 50 caracteres.',
            'titulo.required' => 'El campo titulo es obligatorio',
            'titulo.min' => 'El campo titulo debe contener al menos 10 caracteres',
            'editor_post.required' => 'El campo contenido es obligatorio',
            'editor_post.min' => 'El campo contenido debe contener al menos 10 caracteres',
            'imagen_file.required_without' => 'Debe ingresar una imagen o una URL de imagen',
            'imagen_file.mimes' => 'Debe ser un imagen de tipo JPG o PNG',
            'imagen_file.image' => 'Debe ser un imagen de tipo JPG o PNG',
            'imagen_url.required_without' => 'Debe ingresar una URL de imagen o un archivo de imagen',
            'imagen_url.url' => 'Ingrese una url correcta',
            'tags.required' => 'El campo tags es obligatorio',
            'tags.min' => 'El campo tags debe contener al menos 5 caracteres',
            'tags.max' => 'El campo tags debe contener mas de 50 caracteres',
        ];
    }

}
