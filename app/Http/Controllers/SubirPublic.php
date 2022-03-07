<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class SubirPublic extends Controller
{
    public function Guardar(Request $request){

        if($request['pub']){
            
        // Procesos para subir a la BD
        // si el post (request) es almacenado en la BD entonces:

        

            return true;
        }else{
            return false;
        }

      
      

    }
}
