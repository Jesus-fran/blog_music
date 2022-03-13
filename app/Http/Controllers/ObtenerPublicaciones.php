<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObtenerPublicaciones extends Controller
{
    public function ObtenerPublicacion()
    {
        $publicacion = DB::table('posts')->select('id', 'email_redactor', 'categoria', 'titulo', 'contenido', 'imagen', 'created_at')->get();
        $publicaciones = "";


        foreach ($publicacion as $dato) {
            $img = asset($dato->imagen);
            
            
            $public = "<div class=\"col\">
            <div class=\"card\" style=\"width: 18rem; height:26rem;\">
            <div class=\"img_pub\">
            <img src=\"".$img."\" class=\"card-img-top imagen_posts\" alt=\"...\">
            </div>
             <div class=\"card-body\">
               <a href=\"{{ url('/pub1') }}\">
                   <h6 class=\"card-title\">".$dato->titulo."</h6>
               </a>
               <p class=\"card-text\">".$dato->contenido."</p>
            </div>
            <div class=\"card-footer\">
               <small class=\"text-muted\">
                   ".$dato->email_redactor." | ".$dato->created_at."
               </small>
            </div>
            </div>
            </div>";
            $publicaciones .= $public;
        }


        return $publicaciones;
    }
}
