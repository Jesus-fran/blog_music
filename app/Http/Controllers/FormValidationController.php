<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;

class FormValidationController extends Controller
{
  
    // public function createUserForm(Request $request) 
    // {
    //     return view('/regis_user');
    // }
     

  public function UserForm(Request $request) 
  {

    $rules = [
        'nombre_user' => 'required|min:4|max:20',
        'correo' => 'required|email',
        'pass_1' => 'required|min:8|max:30',
        'pass_2' => 'required|min:8|max:30|same:pass_1',
        'perms' => 'required',
    ];

    $customMessages = [
        'nombre_user.required' => 'El campo nombre es obligatorio',
        'nombre_user.min' => 'El campo nombre debe contener al menos 4 caracteres.',
        'nombre_user.max' => 'El campo nombre no debe contener más de 20 caracteres.',
        'correo.required' => 'El campo correo es obligatorio',
        'pass_1.required'  => 'El campo contraseña es obligatorio',
        'pass_1.min' => 'El campo nombre debe contener al menos 8 caracteres.',
        'pass_1.max' => 'El campo nombre no debe contener más de 30 caracteres.',
        'pass_2.required' => 'El campo contraseña es obligatorio',
        'pass_2.min' => 'El campo nombre debe contener al menos 8 caracteres.',
        'pass_2.max' => 'El campo nombre no debe contener más de 30 caracteres.',
        'pass_2.same' => 'Las contraseñas deben coincidir.',
        'perms.required' => 'Acepte los terminos para continuar',
    ];

    $request->validate($rules, $customMessages);
       
    return redirect()->route('/regis_user');

  


    }
      
     
}
