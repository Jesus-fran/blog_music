<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObtenerLectores extends Controller
{
    public function Obtener()
    {

        $url_anterior = url()->previous();
        $url_admin_redactores = url()->route('admin-lectores');
        if ($url_anterior != $url_admin_redactores) {
            return redirect()->route('admin-lectores');
        }

        $lectores = DB::table('usuarios')->select('email', 'nombre')->where('tipo','=', 'LECTOR')->orderByDesc('created_at')->paginate(15);
        $contenido = "";
        if ($lectores->isEmpty()) {
            return 'NINGUNO';
        } else {
            foreach ($lectores as $element) {
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
            if ($lectores->lastPage() == $lectores->currentPage()) {
                $atributo_next = "disabled";
            }
            if ($lectores->firstItem() == $lectores->currentPage()) {
                $atributo_previus = "disabled";
            }
            $nav_pagination = "
            <nav aria-label='Page navigation example'>
            <ul class='pagination justify-content-center'>
                
                <li class='page-item " . $atributo_previus . "'>
                <a class='page-link' href='" . $lectores->previousPageUrl() . "' tabindex='-1' aria-disabled='true'>Previous</a>
                </li>
                <li class='page-item disabled'><a class='page-link' href='#'>Página " . $lectores->currentPage() . "</a></li>
                <li class='page-item " . $atributo_next . "'>
                <a class='page-link' href='" . $lectores->nextPageUrl() . "'>Next</a>
                </li>
            </ul>
            </nav>             
         
            ";
            $contenido .= $nav_pagination;
            return $contenido;
        }
    }
}
