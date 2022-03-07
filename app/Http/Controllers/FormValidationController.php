<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Form;
use App\Http\Requests\RegisUserRequest;
use App\Http\Requests\IniciarSesionRequest;
use App\Models\Usuario;
use DateTime;
use Illuminate\Support\Facades\Hash;


class FormValidationController extends Controller
{
  
  public function GetViewRegistrarse($registro)
  {
    return view('cuenta.registrar.registrar_usuario', compact('registro'));
  }


  public function UserForm(RegisUserRequest $request) 
  {
    $usuario = new Usuario();
    $dtm = new DateTime();
    $usuario->email = $request->correo;
    $usuario->password = Hash::make($request->pass_1);;
    $usuario->nombre = $request->nombre_user;
    $usuario->tipo = $request->tipo_usuario;
    $dtm = new DateTime();
    $dtm->format('Y-m-d H:i:s');
    $usuario->created_at = $dtm;
    $usuario->updated_at = $dtm;

    $usuario->save();

    return redirect()->route('registrarse',  ['registro'=>'true']);

  }


  public function IniciarSesion(IniciarSesionRequest $request){
    $email_req = $request->correo;
    $pass_req = $request->password;

    $credenciales = ['email'=>$email_req,'password'=>$pass_req];
    
    if(Auth::attempt($credenciales)){
      return "Logueado exisitosamente";
    }
    return "FALLO";

  }
      
     
}
