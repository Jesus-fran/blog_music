<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObtenerPostsAdmin extends Controller
{
    public function ObtenerPublicacion()
    {

        $url_anterior = url()->previous();
        $url_posts_admin =url()->route('admin-publicaciones'); 
        if ($url_anterior != $url_posts_admin) {
            return redirect()->route('admin-publicaciones');
        }

        $publicacion = DB::table('posts')->select('id', 'email_redactor', 'categoria', 'titulo', 'contenido', 'imagen', 'created_at')->paginate(9);
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

                    $public = "<div class=\"col\">
                    <div class=\"card card_pub\" style=\"width: 18rem; height:26rem;\">
                    <div class=\"img_pub\">
                    <img src=\"" . $img . "\" class=\"card-img-top imagen_posts\" alt=\"...\">
                    </div>
                    <div class=\"card-body\">
                   
                        <h6 class=\"card-title\">" . $dato->titulo . "</h6>
                    
                    <p class=\"card-text\">" . $contenido . "</p>
                    </div>
                    <div class=\"card-footer\">
                    <small class=\"text-muted\">
                    <button class=\"btn btn-warning\" data-id=\"$dato->id\" onclick=\"EliminarPost(this)\" role=\"button\">Eliminar</button>
                    </small>
                    </div>
                    </div>
                    </div>";
                    $publicaciones .= $public;
                }
            }

            $atributo_next = "";
            $atributo_previus = "";
            if ($publicacion->lastPage() == $publicacion->currentPage()) {
                $atributo_next = "disabled";
            }
            if ($publicacion->firstItem() == $publicacion->currentPage()) {
                $atributo_previus = "disabled";
            }

            $nav_pagination = "
            <div class=\"col-12\">
            <nav aria-label='Page navigation example'>
            <ul class='pagination justify-content-center'>
                
                <li class='page-item " . $atributo_previus . "'>
                <a class='page-link' href='" . $publicacion->previousPageUrl() . "' tabindex='-1' aria-disabled='true'>Previous</a>
                </li>
                <li class='page-item disabled'><a class='page-link' href='#'>Página " . $publicacion->currentPage() . "</a></li>
                <li class='page-item " . $atributo_next . "'>
                <a class='page-link' href='" . $publicacion->nextPageUrl() . "'>Next</a>
                </li>
            </ul>
            </nav>             
            </div>
            ";

            return $publicaciones .= $nav_pagination;
        }
    }

    public function Eliminar(Request $request)
    {

        $url_anterior = url()->previous();
        $url_posts_admin =url()->route('admin-publicaciones'); 
        if ($url_anterior != $url_posts_admin) {
            return redirect()->route('admin-publicaciones');
        }


        $comentarios= DB::table('comentarios')->where('id_post', '=', $request->id_post)->get();
        if ($comentarios->isEmpty()) {

            $posts_eliminados = DB::table('posts')->where('id', '=', $request->id_post)->delete();
            if($posts_eliminados == 1){
                return "ELIMINADO";
            }
            
        }else{

            foreach ($comentarios as $key => $valor) {
                $id_comentario = $valor->id;   

                $resp_eliminado = DB::table('respuestas')->where('id_comentario', '=', $id_comentario)->delete();

            }
            $coment_eliminado = DB::table('comentarios')->where('id_post', '=', $request->id_post)->delete();
            $posts_eliminados = DB::table('posts')->where('id', '=', $request->id_post)->delete();
            if($posts_eliminados == 1){
                return "ELIMINADO";
            }
        }
       
    }
}
