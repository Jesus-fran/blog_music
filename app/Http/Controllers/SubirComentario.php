<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Requests\SubirComentRequest;

class SubirComentario extends Controller
{
    public function Guardar(SubirComentRequest $request)
    {

        if ($request->comentario != "" && $request->comentario != null && $request->id != "" && $request->id != null) {

            $comentario = new Comentario();
            $email_user = session('email');
            $id_post = $request['id'];
            $comentario = $request['comentario'];
            return $email_user;
        }
    }
}
