<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EliminarRedactor extends Controller
{


    public function Eliminar(Request $request)
    {

        $url_anterior = url()->previous();
        $url_admin_redactores = url()->route('admin-redactores');
        if ($url_anterior != $url_admin_redactores) {
            return redirect()->route('admin-redactores');
        }

        
        $posts = DB::table('posts')->where('email_redactor', '=', $request->email_redactor)->get();
        if ($posts->isEmpty()) {


            $respuestas_eliminar = DB::table('respuestas')->where('email_usuario', '=', $request->email_redactor)->delete();

            $comentarios = DB::table('comentarios')->where('email_usuario', '=', $request->email_redactor)->get();
            foreach ($comentarios as $key => $comentario) {
                $id_comentario = $comentario->id;
                $respuestas_comentario_user = DB::table('respuestas')->where('id_comentario', '=', $id_comentario)->delete();
            }

            $elim_coment = DB::table('comentarios')->where('email_usuario', '=', $request->email_redactor)->delete();
            $usuario_elim = DB::table('usuarios')->where('email', '=', $request->email_redactor)->delete();
            if ($usuario_elim == 1) {
                return "ELIMINADO";
            }
        } else {

            $elim_posts = 0;

            foreach ($posts as $key => $post) {
                $id_post = $post->id;

                $comentarios_post = DB::table('comentarios')->where('id_post', '=', $id_post)->get();
                foreach ($comentarios_post as $key => $comentario) {
                    $id_comentario = $comentario->id;
                    $respuestas_comentario = DB::table('respuestas')->where('id_comentario', '=', $id_comentario)->delete();
                }

                $eliminar_comentarios_post = DB::table('comentarios')->where('id_post', '=', $id_post)->delete();
            }
         
                $posts_eliminar = DB::table('posts')->where('email_redactor', '=', $request->email_redactor)->delete();
                $elim_posts = $posts_eliminar;
            
            if ($elim_posts != 0) {

                $respuestas_eliminar = DB::table('respuestas')->where('email_usuario', '=', $request->email_redactor)->delete();

                $comentarios = DB::table('comentarios')->where('email_usuario', '=', $request->email_redactor)->get();
                foreach ($comentarios as $key => $comentario) {
                    $id_comentario = $comentario->id;
                    $respuestas_comentario_user = DB::table('respuestas')->where('id_comentario', '=', $id_comentario)->delete();
                }

                $elim_coment = DB::table('comentarios')->where('email_usuario', '=', $request->email_redactor)->delete();
                $usuario_elim = DB::table('usuarios')->where('email', '=', $request->email_redactor)->delete();
                if ($usuario_elim == 1) {
                    return "ELIMINADO";
                }
            }
        }
    }
}
