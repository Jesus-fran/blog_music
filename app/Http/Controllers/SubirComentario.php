<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubirComentario extends Controller
{
    public function Guardar(Request $request){

        if($request['comentario']){

        // Procesos para subir a la BD
        // si elcomentario (request) es almacenado en la BD entonces:
            return true;
        }else{
            return false;
        }

      
      

    }
}
