<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Jsonable;

class ObtenerRedactores extends Controller
{
    public function Obtener()
    {
        $redactores = DB::table('usuarios')->select('email', 'nombre')->where('tipo','=', 'REDACTOR')->orderByDesc('created_at')->paginate(15);
        $contenido = "";
        if ($redactores->isEmpty()) {
            return "NINGUNO";
        } else {
            foreach ($redactores as $element) {
                $email = $element->email;

                $usuario = "
                <li class='list-group-item d-flex justify-content-between align-items-center'><div class='col text-start'>
                  " . $element->nombre . "
                </div>
                <div class='col offset-md-4 text-end'><button class='btn btn-warning' data-id=\"".$email."\" onclick=\"eliminar(this)\" role='button'>Eliminar</button>  </div>
              </li>";
                $contenido .= $usuario;
            }
            $atributo_next = "";
            $atributo_previus = "";
            if ($redactores->lastPage() == $redactores->currentPage()) {
                $atributo_next = "disabled";
            }
            if ($redactores->firstItem() == $redactores->currentPage()) {
                $atributo_previus = "disabled";
            }
            $nav_pagination = "
            <nav aria-label='Page navigation example'>
            <ul class='pagination justify-content-center'>
                
                <li class='page-item " . $atributo_previus . "'>
                <a class='page-link' href='" . $redactores->previousPageUrl() . "' tabindex='-1' aria-disabled='true'>Previous</a>
                </li>
                <li class='page-item disabled'><a class='page-link' href='#'>" . $redactores->currentPage() . "</a></li>
                <li class='page-item " . $atributo_next . "'>
                <a class='page-link' href='" . $redactores->nextPageUrl() . "'>Next</a>
                </li>
            </ul>
            </nav>             
         
            ";
            $contenido .= $nav_pagination;
            return $contenido;
        }
    }
}
