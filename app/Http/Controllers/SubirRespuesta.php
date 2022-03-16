<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Http\Requests\SubirRespuestaRequest;

class SubirRespuesta extends Controller
{
    public function Guardar(SubirRespuestaRequest $request)
    {
        if ($request->respuesta != "" && $request->respuesta != null && $request->id_comentario != "" && $request->id_comentario != null) {



            $respuesta = new Respuesta();
            $date_time = new DateTime();
            $date_time->format('Y-m-d H:i:s');
            $email_user = session('email');
            $id_comentario = $request->id_comentario;
            $respuesta_obtenido = $request->respuesta;
                // Se almacena en la BD
            $respuesta->email_usuario = $email_user;
            $respuesta->id_comentario = $id_comentario;
            $respuesta->texto = $respuesta_obtenido;
            $respuesta->created_at = $date_time;
            $respuesta->updated_at = $date_time;
            $respuesta->save();
            return true;
        }
    }
}
