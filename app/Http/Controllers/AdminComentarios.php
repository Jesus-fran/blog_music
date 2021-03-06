<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminComentarios extends Controller
{
    public function Obtener(Request $request)
    {

            $url_anterior = url()->previous();
            $url_comentarios_admin = url()->route('admin-comentarios');
            if ($url_anterior != $url_comentarios_admin) {
                return redirect()->route('admin-comentarios');
            }

            $id        = 0;
            $contenido    = "";
            $email = "";
            $fecha = "";
            $nombre_user = "";

            // Se obtienen los comentarios de la BD
            $comentario_bd = DB::table('comentarios')->select('id','id_post', 'email_usuario', 'texto', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
            $comentarios = "";

            $color_body_coment = "";
            $color_body_resp = "";

            if ($comentario_bd->isEmpty()) {

                return "<div class=\"row\">
                <div class=\"col\">
                    <div class=\"card\">
                        
                        <div class=\"card-body\">
                            <blockquote class=\"blockquote mb-0\">
                                <p> No hay comentarios</p>
                                <footer class=\"blockquote-footer\"></footer>
                            </blockquote>
                        </div>
                    
                    </div>
                </div>
                </div><br><br>";
            } else {
                $longitud = count($comentario_bd);
                $textarea = "";
                $dir = "";
                $nombre_post_antes = "";
                $post_comentario = "";

                // se extrae cada uno de los comentarios
                foreach ($comentario_bd as $data) {
                    $id_post = $data->id_post;
                    $nombre_bd_post = DB::table('posts')->select('titulo')->where('id', '=', $id_post)->get();
                    $nombre_post = $nombre_bd_post[0]->titulo;
                    $num_comentario = $longitud;
                    $longitud = $longitud - 1;
                    $id = $data->id;
                    $contenido = $data->texto;
                    $email = $data->email_usuario;
                    $fecha = $data->created_at;

                    if ($nombre_post_antes == $nombre_post) {
                        $post_comentario = "";
                    }else{
                        $post_comentario = "<br><br><br><h5 class=\"sub-font\">".$nombre_post."</h5><br><br>";
                        $nombre_post_antes = $nombre_post;
                    }

                    $comprobado = false;

                    // Se comprueba si hay un usuario logueado
                    if (session('email') && !$comprobado) {
                        if ($email == session('email')) {
                            $color_body_coment = "card_body";
                        } else {
                            $color_body_coment = "";
                        }
                        $comprobado = true;
                        $dir = "<button class=\"btn btn-secondary btn-sm\" role=\"button\"  id=\"btn_responder\" onclick=\"MostrarTextarea(this)\">Responder</button>";
                        $textarea = "<div style=\"display:none\"><textarea name=\"respuesta\" class=\"form-control text_respuesta\" id=\"respuesta\" rows=\"6\" placeholder=\"Escriba su respuesta\" maxlength= \"2000\" minlength=\"4\"></textarea><br><h5 class=\"text-warning bg-light\" align=\"center\"></h5><button id=\"saveResp\" data-id=\"$id\" onclick=\"SubirRespuesta(this)\" class=\"btn btn-success btn-sm\">Subir respuesta</button></div>";
                    } else {
                        $url = route('mi-cuenta', ['redirect_to' => url()->previous()]);
                        $dir = "<a href=\"$url\" class=\"btn btn-secondary btn-sm\" role=\"button\" id=\"btn_responder\">Responder</a>";
                    }

                    $fecha_format = date('d-m-Y', strtotime($fecha));
                    $hora_format =  date('H-i-s', strtotime($fecha));

                    // Se obtiene el nombre del usuario que coment??
                    $usuario = DB::table('usuarios')->select('nombre')->where('email', '=', $email)->get();
                    if ($usuario->isEmpty()) {

                        return "<br><h5>Hubo un error usuario no encontrado</h5><br><br><br><br><br><br><br><br><br><br><br><br>";
                    } else {

                        $nombre_user = $usuario[0]->nombre;
                        $respuesta = "";
                        // Se busca en la BD las respuestas de dicho comentario
                        $respuesta_bd = DB::table('respuestas')->select( 'id' , 'email_usuario', 'texto', 'created_at', 'updated_at')->where('id_comentario', '=', $id)->orderBy('created_at', 'desc')->get();
                        $longitud_resp = count($respuesta_bd);
                        if ($respuesta_bd->isEmpty()) {
                            $respuesta = "";
                        } else {

                            // Se extrae cada una de las respuestas
                            foreach ($respuesta_bd as $dato_resp) {
                                $id_respuesta = $dato_resp->id;
                                $num_respuesta = $longitud_resp;
                                $longitud_resp = $longitud_resp - 1;
                                $email_usuario_resp = $dato_resp->email_usuario;
                                $contenido_resp = $dato_resp->texto;
                                $fecha_resp = $data->created_at;
                                $fecha_format_resp = date('d-m-Y', strtotime($fecha_resp));
                                $hora_format_resp =  date('H-i-s', strtotime($fecha_resp));

                                if ($email_usuario_resp == session('email')) {
                                    $color_body_resp = "card_body";
                                } else {
                                    $color_body_resp = "";
                                }

                                // Se obtiene el nombre del usuario que respondi??
                                $usuario_resp = DB::table('usuarios')->select('nombre')->where('email', '=', $email_usuario_resp)->get();

                                if ($usuario_resp->isEmpty()) {

                                    return "<br><h5>Hubo un error usuario resp no encontrado</h5><br><br><br><br><br><br><br><br><br><br><br><br>";
                                } else {

                                    $nombre_user_resp = $usuario_resp[0]->nombre;
                                    // Se genera un card de respuesta y se va almacenando
                                    $respuesta_generada = "<br>
                                    <div class=\"col-10 align-self-end offset-2\">
                                    <div class=\"card  shadow-sm col_respuesta\">
                                    <div class=\"card-header header_comentarios\">
                                    <button class=\"btn btn-warning btn-sm offset-md-6 offset-sm-1 float-end\" data-id=\"$id_respuesta\" onclick=\"EliminaRespuesta(this)\" role=\"button\">Eliminar</button>

                                    </div>
                                    <div class=\"card-body " . $color_body_resp . "\">

                                        <div class=\"col float-end\">
                                            <div class=\"btn-group\">
                                                <button class=\"btn btn-sm\" type=\"button\" data-bs-toggle=\"dropdown\"
                                                    aria-expanded=\"false\">
                                                    <i class=\"bi bi-three-dots-vertical\"></i>
                                                </button>
                
                                                <ul class=\"dropdown-menu options\">
                                                    <li>Fecha: ".$fecha_format_resp."</li>
                                                    <li>Hora:".$hora_format_resp. "</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6 class=\"card-subtitle mb-2 text-muted \">(".$num_respuesta.")"." "." ".$nombre_user_resp. "</h6>
                                        <br>
                                        <p> " . $contenido_resp . " </p>
                                        <br>                  
                                    </div>
                                    </div>
                                    </div>";
                                    $respuesta .= $respuesta_generada;
                                }
                            }
                        }


                        // Se genera un card de comentario, se agrega las respuestas y se va almacenando
                        $card_comentarios = "
                        ".$post_comentario."
                        
                        <div class=\"row\">
                            <div class=\"col\">
                                <div class=\"card card_comentarios\">
                                    <div class=\"card-header header_comentarios\">
                                        <button class=\"btn btn-warning btn-sm offset-md-10 offset-sm-1 float-end\" data-id=\"$id\" onclick=\"EliminarComentario(this)\" role=\"button\">Eliminar</button>
                                    </div>
                                    <div class=\"card-body " . $color_body_coment . "\">
                                        <div class=\"col float-end\">
                                            <div class=\"btn-group\">
                                                <button class=\"btn btn-sm\" type=\"button\" data-bs-toggle=\"dropdown\"
                                                    aria-expanded=\"false\">
                                                    <i class=\"bi bi-three-dots-vertical\"></i>
                                                </button>
                
                                                <ul class=\"dropdown-menu options\">
                                                    <li>Fecha: ".$fecha_format."</li>
                                                    <li>Hora:".$hora_format. "</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6 class=\"card-subtitle mb-2 text-muted \">(".$num_comentario.")"." "." ".$nombre_user. "</h6>
                                        <br>
                                        <p>" . $contenido . "</p>
                                        <br>
                                    </div>
                                    <div class=\"card-footer card_footer\" id=\"card_footer\">
                                    " . $respuesta . "
                                    </div>
                                </div>
                            </div>
                        </div><br><br>";


                        $comentarios .= $card_comentarios;
                    }
                }
                // Retorna todos los comentarios con sus respuestas
                return $comentarios;
            }
        
    }

    public function EliminarComentario(Request $request)
    {

        $url_anterior = url()->previous();
        $url_comentarios_admin = url()->route('admin-comentarios');
        if ($url_anterior != $url_comentarios_admin) {
            return redirect()->route('admin-comentarios');
        }

        $comentarios = DB::table('comentarios')->where('id', '=', $request->id_comentario)->get();
        if ($comentarios->isEmpty()) {

            return "ERROR";
            
        } else {

            $resp_eliminado = DB::table('respuestas')->where('id_comentario', '=', $request->id_comentario)->delete();
            if ($resp_eliminado == 1) {
                $coment_eliminado = DB::table('comentarios')->where('id', '=', $request->id_comentario)->delete();
                if ($coment_eliminado == 1) {
                    return "ELIMINADO";
                }
            }else{
                $coment_eliminado = DB::table('comentarios')->where('id', '=', $request->id_comentario)->delete();
                if ($coment_eliminado == 1) {
                    return "ELIMINADO";
                }
            }
        }

    }

    public function EliminaRespuesta(Request $request)
    {
        $url_anterior = url()->previous();
        $url_comentarios_admin = url()->route('admin-comentarios');
        if ($url_anterior != $url_comentarios_admin) {
            return redirect()->route('admin-comentarios');
        }

        $respuestas = DB::table('respuestas')->where('id', '=', $request->id_respuesta)->get();
        if ($respuestas->isEmpty()) {

            return "ERROR";
            
        } else {

            $resp_eliminado = DB::table('respuestas')->where('id', '=', $request->id_respuesta)->delete();
            if ($resp_eliminado == 1) {
               
                    return "ELIMINADO";
                
            }else{
                return "ERROR";
            }
        }


    }
}
