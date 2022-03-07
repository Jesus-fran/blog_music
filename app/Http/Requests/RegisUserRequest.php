<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisUserRequest extends FormRequest
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
            'nombre_user' => 'required|min:4|max:20|regex:/^[a-zA-Z\sñ]+$/',
            'correo' => 'required|email||min:6|max:50|unique:App\Models\Usuario,email',
            'pass_1' => ['required','max:30', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'pass_2' => 'required|min:8|max:30|same:pass_1',
            'tipo_usuario' => ['required', 'min:6', 'max:8', 'alpha', 'regex:/^[LECTOR|REDACTOR]+$/'],
            'perms' => 'required',
        ];
    }

    public function messages(){
        return [
            'nombre_user.required' => 'El campo nombre es obligatorio',
            'nombre_user.min' => 'El campo nombre debe contener al menos 4 caracteres.',
            'nombre_user.max' => 'El campo nombre no debe contener más de 20 caracteres.',
            'correo.required' => 'El campo correo es obligatorio',
            'correo.unique' => 'Este correo ya está registrado.',
            'correo.regex' => 'El correo no cumple con las especificaciones.',
            'pass_1.required'  => 'El campo contraseña es obligatorio',
            'pass_1.min' => 'La contraseña debe contener al menos 8 caracteres.',
            'pass_1.max' => 'La contraseña no debe contener más de 30 caracteres.',
            'pass_2.required' => 'El campo contraseña es obligatorio',
            'pass_2.min' => 'El campo nombre debe contener al menos 8 caracteres.',
            'pass_2.max' => 'El campo nombre no debe contener más de 30 caracteres.',
            'pass_2.same' => 'Las contraseñas deben coincidir.',
            'tipo_usuario.required' => 'El campo tipo de usuario es obligatorio.',
            'tipo_usuario.min' => 'El tipo de usuario debe contener almenos 6 caracteres.', 
            'tipo_usuario.max' => 'El tipo de usuario no debe contener más de 8 caracteres.',
            'tipo_usuario.alpha' => 'El tipo de usuario solo puede contener letras.',
            'tipo_usuario.regex' => 'El tipo de usuario no es correcto.',
            'perms.required' => 'Acepte los terminos para continuar',
        ];
    }
}
