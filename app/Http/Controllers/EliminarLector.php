<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EliminarLector extends Controller
{
    public function Eliminar(Request $request)
    {

        $url_anterior = url()->previous();
        $url_admin_redactores = url()->route('admin-lectores');
        if ($url_anterior != $url_admin_redactores) {
            return redirect()->route('admin-lectores');
        }



        $respuestas = DB::table('respuestas')->where('email_usuario', '=', $request->id_lector)->get();
        if ($respuestas->isEmpty()) {

            $comentarios = DB::table('comentarios')->where('email_usuario', '=', $request->id_lector)->get();
            if ($comentarios->isEmpty()) {

                $user_eliminado = DB::table('usuarios')->where('email', '=', $request->id_lector)->delete();
                if ($user_eliminado == 1) {
                    return "ELIMINADO";
                }
            } else {

                foreach ($comentarios as $key => $valor) {
                    $id_comentario = $valor->id;

                    $resp_eliminado = DB::table('respuestas')->where('id_comentario', '=', $id_comentario)->delete();
                }
                $coment_eliminado = DB::table('comentarios')->where('email_usuario', '=', $request->id_lector)->delete();
                $user_eliminado = DB::table('usuarios')->where('email', '=', $request->id_lector)->delete();

                if ($user_eliminado == 1) {
                    return "ELIMINADO";
                }
            }
        } else {
            $respuestas_elim = DB::table('respuestas')->where('email_usuario', '=', $request->id_lector)->delete();
            if ($respuestas_elim == 1) {


                $comentarios = DB::table('comentarios')->where('email_usuario', '=', $request->id_lector)->get();
                if ($comentarios->isEmpty()) {

                    $user_eliminado = DB::table('usuarios')->where('email', '=', $request->id_lector)->delete();
                    if ($user_eliminado == 1) {
                        return "ELIMINADO";
                    }
                } else {

                    foreach ($comentarios as $key => $valor) {
                        $id_comentario = $valor->id;

                        $resp_eliminado = DB::table('respuestas')->where('id_comentario', '=', $id_comentario)->delete();
                    }
                    $coment_eliminado = DB::table('comentarios')->where('email_usuario', '=', $request->id_lector)->delete();
                    $user_eliminado = DB::table('usuarios')->where('email', '=', $request->id_lector)->delete();

                    if ($user_eliminado == 1) {
                        return "ELIMINADO";
                    }
                }
            }
        }
    }
}
