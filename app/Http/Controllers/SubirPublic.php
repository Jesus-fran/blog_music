<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubirPublicRequest;
use DateTime;

class SubirPublic extends Controller
{
    public function Guardar(SubirPublicRequest $request)
    {
        $post = new Post();
        $id_anterior = DB::table('posts')->max('id');
        // Si hay una publicacion anterior en la BD entonces
        if ($id_anterior != "") {
            $id_actual_post = strval($id_anterior + 1)."-";
            // Si la imagen es una url entonces
            if ($request->imagen_url == "" || $request->imagen_url == null) {
                $email_redactor_actual = session('email');
                $date_time = new DateTime();
                $date_time->format('Y-m-d H:i:s');
                // Guardar post en la BD
                $post->email_redactor = $email_redactor_actual;
                $post->categoria = $request->categoria;
                $post->titulo = $request->titulo;
                $post->contenido = $request->editor_post;
                //guarda la imagen en public/uploads
                $file = $request->file('imagen_file');
                $nombre_img = "uploads/".$id_actual_post . $file->getClientOriginalName();
                $file->move('uploads', $nombre_img);
                $post->imagen = $nombre_img;
                $post->tags = $request->tags;
                $post->created_at = $date_time;
                $post->updated_at = $date_time;
                $post->save();
            } else {
                $email_redactor_actual = session('email');
                $date_time = new DateTime();
                $date_time->format('Y-m-d H:i:s');
                // Guardar post en la BD
                $post->email_redactor = $email_redactor_actual;
                $post->categoria = $request->categoria;
                $post->titulo = $request->titulo;
                $post->contenido = $request->editor_post;
                $post->imagen = $request->imagen_url;
                $post->tags = $request->tags;
                $post->created_at = $date_time;
                $post->updated_at = $date_time;
                $post->save();
            }
        } else {
            if ($request->imagen_url == "" || $request->imagen_url == null) {
                $email_redactor_actual = session('email');
                $date_time = new DateTime();
                $date_img = date_format($date_time, 'Y-m-d_H-i-s_');
                $date_time->format('Y-m-d H:i:s');
                // Guardar post en la BD
                $post->email_redactor = $email_redactor_actual;
                $post->categoria = $request->categoria;
                $post->titulo = $request->titulo;
                $post->contenido = $request->editor_post;
                //guarda la imagen en public/uploads
                $file = $request->file('imagen_file');
                $nombre_img = "uploads/".$date_img . $file->getClientOriginalName();
                $file->move('uploads', $nombre_img);
                $post->imagen = $nombre_img;
                $post->tags = $request->tags;
                $post->created_at = $date_time;
                $post->updated_at = $date_time;
                $post->save();
            } else {
                $email_redactor_actual = session('email');
                $date_time = new DateTime();
                $date_time->format('Y-m-d H:i:s');
                // Guardar post en la BD
                $post->email_redactor = $email_redactor_actual;
                $post->categoria = $request->categoria;
                $post->titulo = $request->titulo;
                $post->contenido = $request->editor_post;
                $post->imagen = $request->imagen_url;
                $post->tags = $request->tags;
                $post->created_at = $date_time;
                $post->updated_at = $date_time;
                $post->save();
            }
        }
    }
}
