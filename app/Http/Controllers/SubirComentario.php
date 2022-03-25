<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Requests\SubirComentRequest;

class SubirComentario extends Controller
{
    public function Guardar(SubirComentRequest $request)
    {



        $url_anterior = url()->previous();
        $url_post = url('publicaciones', ['id' => $request->id_pub]);
        if ($url_anterior != $url_post) {
            return redirect($url_post);
        }

        if ($request->comentario != "" && $request->comentario != null && $request->id_pub != "" && $request->id_pub != null) {

            $comentario = new Comentario();
            $date_time = new DateTime();
            $date_time->format('Y-m-d H:i:s');
            $email_user = session('email');
            $id_post = $request->id_pub;
            $comentario_obtenido = $request['comentario'];
            $comentario->email_usuario = $email_user;
            $comentario->id_post = $id_post;
            $comentario->texto = $comentario_obtenido;
            $comentario->created_at = $date_time;
            $comentario->updated_at = $date_time;
            $comentario->save();
            return true;
        }
    }
}
