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
    $registro = 'true';
    if ($request->has('redirect_to')) {
      $url_anterior = $request->redirect_to;
      return redirect()->route('mi-cuenta', ['redirect_to'=>$url_anterior, 'registro'=>'true']);
    }

    return redirect()->route('mi-cuenta', ['registro'=>'true',]);
  }


  public function IniciarSesion(IniciarSesionRequest $request)
  {

    $url_anterior = "";
    if ($request->has('redirect_to')) {
      $url_anterior = $request->redirect_to;
    }

    $email_req = $request->correo;
    $pass_req = $request->password;

    $credenciales = ['email'=>$email_req,'password'=>$pass_req];

    if(Auth::attempt($credenciales)){
      $tipo_user_logueado = Auth::user()->tipo;
      $datos_sesion = ['email'=>$email_req, 'nombre'=>Auth::user()->nombre, 'tipo'=>$tipo_user_logueado];

      if ($tipo_user_logueado == 'REDACTOR') {
        session()->flush();
        session()->regenerate();
        session($datos_sesion);
        if ($url_anterior != "") {
          return redirect($url_anterior);
        }
        return redirect()->route('crear-publicacion');
      }
      elseif ($tipo_user_logueado == 'LECTOR') {
        session()->flush();
        session()->regenerate();
        session($datos_sesion);
        if ($url_anterior != "") {
          return redirect($url_anterior);
        }
        return redirect()->route('publicaciones');
      }
      elseif ($tipo_user_logueado == 'ADMIN') {
        session()->flush();
        session()->regenerate();
        session($datos_sesion);
        if ($url_anterior != "") {
          return redirect($url_anterior);
        }
        return redirect()->route('administracion');
      }
    }
    return redirect()->route('mi-cuenta', ['redirect_to'=>$url_anterior, 'status'=>'false']);
  }

  public function CerrarSesion()
  {
    Auth::logout();
    session()->flush();
    return redirect()->route('mi-cuenta');
  }
}
