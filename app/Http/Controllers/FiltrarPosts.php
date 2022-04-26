<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiltrarPosts extends Controller
{
    public function FiltrarCategorias(Request $request)
    {
        $url_anterior = url()->previous();
        $url_posts_admin =url()->route('publicaciones'); 
        if ($url_anterior != $url_posts_admin) {
            return redirect()->route('publicaciones');
        }
        $categoria = '';
    
        if ($request->id_categoria == '2') {
            $categoria =  'MUSICA POPULAR MODERNA';
        }elseif ($request->id_categoria == '3') {
            $categoria = 'MUSICA INSTRUMENTAL';
        }elseif ($request->id_categoria == '4') {
            $categoria = 'MUSICA REGIONAL';
        }elseif ($request->id_categoria == '5') {
            $categoria = 'CONCIERTOS';
        }
        if ($categoria != '') {
            $publicacion = DB::table('posts')->select('id', 'email_redactor', 'categoria', 'titulo', 'contenido', 'imagen', 'created_at')->where('categoria', '=', $categoria)->paginate(9);
        } else {
            $publicacion = DB::table('posts')->select('id', 'email_redactor', 'categoria', 'titulo', 'contenido', 'imagen', 'created_at')->paginate(9);
        }
        
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
                    $fecha_creacion = date('d-m-Y', strtotime($dato->created_at));                    

                    $img = asset($dato->imagen);

                    $url = url('publicaciones', ['id' => $dato->id]);
                    $public = "<div class=\"col\">
                    <div class=\"card card_pub shadow\" style=\"width: 18rem; height:26rem;\">
                    <div class=\"img_pub\">
                    <img src=\"" . $img . "\" class=\"card-img-top imagen_posts\" alt=\"...\">
                    </div>
                    <div class=\"card-body\">
                    <a href=\"" . $url . "\" class=\"stretched-link\") }}\">
                        <h6 class=\"card-title\">" . $dato->titulo . "</h6>
                    </a>
                    <p class=\"card-text\">" . $contenido . "</p>
                    </div>
                    <div class=\"card-footer\">
                    <small class=\"text-muted\">Por: 
                        " . $usuario[0]->nombre . " | Fecha " . $fecha_creacion . "
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
}
