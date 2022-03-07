<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class IniciarSesionRequest extends FormRequest
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
            'correo' => 'required|email||min:6|max:50',
            'password' => ['required','max:30', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }

    public function messages(){
        return [
            'correo.required' => 'El campo correo es obligatorio',
            'correo.unique' => 'Este correo ya está registrado.',
            'correo.regex' => 'El correo no cumple con las especificaciones',
            'password.required'  => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe contener al menos 8 caracteres.',
            'password.max' => 'La contraseña no debe contener más de 30 caracteres.',
            'password.letters' => 'La contraseña debe tener letritas',
        ];
    }
}
