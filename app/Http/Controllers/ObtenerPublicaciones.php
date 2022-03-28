<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObtenerPublicaciones extends Controller
{
    public function ObtenerPublicacion()
    {

        $url_anterior = url()->previous();
        $url_posts_admin =url()->route('publicaciones'); 
        if ($url_anterior != $url_posts_admin) {
            return redirect()->route('publicaciones');
        }

        $publicacion = DB::table('posts')->select('id', 'email_redactor', 'categoria', 'titulo', 'contenido', 'imagen', 'created_at')->get();
        $publicaciones = "";

        if ($publicacion->isEmpty()) {
            return "<br><h5>Ninguna publicación</h5><br><br><br><br><br><br><br><br><br><br><br><br>";
        } else {
            foreach ($publicacion as $dato) {

                $usuario = DB::table('usuarios')->select('nombre')->where('email', '=', $dato->email_redactor)->get();
                if ($usuario->isEmpty()) {

                    return "<br><h5>Hubo un error</h5><br><br><br><br><br><br><br><br><br><br><br><br>";
                } else {


                    $contenido_cadena = strip_tags($dato->contenido);

                    $contenido = substr($contenido_cadena, 0, 100). "...";


                    $img = asset($dato->imagen);

                    $url = url('publicaciones', ['id' => $dato->id]);
                    $public = "<div class=\"col\">
                    <div class=\"card card_pub\" style=\"width: 18rem; height:26rem;\">
                    <div class=\"img_pub\">
                    <img src=\"" . $img . "\" class=\"card-img-top imagen_posts\" alt=\"...\">
                    </div>
                    <div class=\"card-body\">
                    <a href=\"" . $url . "\") }}\">
                        <h6 class=\"card-title\">" . $dato->titulo . "</h6>
                    </a>
                    <p class=\"card-text\">" . $contenido . "</p>
                    </div>
                    <div class=\"card-footer\">
                    <small class=\"text-muted\">Auto: 
                        " . $usuario[0]->nombre . " | Fecha " . $dato->created_at . "
                    </small>
                    </div>
                    </div>
                    </div>";
                    $publicaciones .= $public;
                }
            }

            return $publicaciones;
        }
    }
}
