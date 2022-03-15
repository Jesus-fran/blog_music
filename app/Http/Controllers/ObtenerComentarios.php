<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ObtenerComentarios extends Controller
{
    public function Obtener(Request $request){


        $comentario = new Comentario();

        if($request['id_publicacion']){


            $id        = "";
            $contenido    = "";
            $email = "";
            $fecha = "";
            $nombre_user = "";



            // Procesos para obtener comentarios de la BD
            // -----
            // ['id'] && $comentarios['id'] != ""
            if($id != "" && $contenido != "" && $email != "" && $fecha != "" && $nombre_user != ""){
                // si el comentario es obtenido de la BD entonces:

                $card_comentarios = "
                <div class=\"row\">
                    <div class=\"col\">
                        <div class=\"card\">
                            <div class=\"card-header\">
                                Comentario".$id."
                            </div>
                            <div class=\"card-body\">
                                <blockquote class=\"blockquote mb-0\">
                                    <p>".$contenido."</p>
                                    <footer class=\"blockquote-footer\">".$nombre_user."-".$fecha."</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div><br><br>";
                return $card_comentarios;
                
            }else{
                return "<div class=\"row\">
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            Comentario 0
                        </div>
                        <div class=\"card-body\">
                            <blockquote class=\"blockquote mb-0\">
                                <p> Ningun comentario</p>
                                <footer class=\"blockquote-footer\"></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>";
            }
            
        }else{
            return false;
        }

      
      

    }
}
