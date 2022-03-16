<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GetViewsController extends Controller
{
    public function ViewHome()
    {
        return view('index');
    }

    public function ViewMiCuenta(Request $request)
    {
        if ($request->has('redirect_to')) {
            session()->put('redirect_to', $request->redirect_to);
            if ($request->has('registro')) {
                $registro = $request->registro;
                return view('cuenta.mi_cuenta', compact('registro'));
            }

            if ($request->has('status')) {
                $status = $request->status;
                return view('cuenta.mi_cuenta', compact('status'));
            }
            return view('cuenta.mi_cuenta');
        } else {
            session()->forget('redirect_to');
            if ($request->has('registro')) {
                $registro = $request->registro;
                return view('cuenta.mi_cuenta', compact('registro'));
            }

            if ($request->has('status')) {
                $status = $request->status;
                return view('cuenta.mi_cuenta', compact('status'));
            }
            return view('cuenta.mi_cuenta');
        }
    }

    public function ViewRegistrarse(Request $request)
    {
        if ($request->has('redirect_to')) {
            $redirect_to = $request->redirect_to;
            return view('cuenta.registrar.registrar_usuario', compact('redirect_to'));
        } else {
            session()->forget('redirect_to');
            return view('cuenta.registrar.registrar_usuario');
        }
    }

    public function ViewPublicaciones()
    {
        return view('publicaciones.publicacion');
    }

    public function ViewCrearPublicacion()
    {
        return view('publicaciones.crear.crear_publicacion');
    }

    public function ViewPublicacion($id)
    {
        $publicacion = DB::table('posts')->select('titulo', 'email_redactor', 'categoria', 'contenido', 'imagen', 'tags', 'created_at', 'updated_at')->where('id', '=', $id)->get();
        if ($publicacion->isEmpty()) {
            return redirect(404);
        } else {
            $titulo = $publicacion[0]->titulo;
            $email_redactor = $publicacion[0]->email_redactor;
            $nombre_autor = "";
            $usuario = DB::table('usuarios')->select('nombre')->where('email', '=', $email_redactor)->get();
            if ($usuario->isEmpty()) {

                return "<br><h5>Hubo un error</h5><br><br><br><br><br><br><br><br><br><br><br><br>";
            
            } else {

                $nombre_autor = $usuario[0]->nombre;

            }
            $categoria = $publicacion[0]->categoria;
            $color_categoria = "";
            if ($categoria == 'CONCIERTOS') {
                $color_categoria = "badge bg-light text-dark";
            } elseif ($categoria == "MUSICA POPULAR MODERNA") {
                $color_categoria = "badge bg-info text-dark";
            } elseif ($categoria == "MUSICA INSTRUMENTAL") {
                $color_categoria = "badge music_instr text-dark";
            } elseif ($categoria == "MUSICA REGIONAL") {
                $color_categoria == "badge bg-primary";
            }

            $contenido = $publicacion[0]->contenido;
            $imagen = asset($publicacion[0]->imagen);
            $tags = $publicacion[0]->tags;
            $created_at = $publicacion[0]->created_at;
            $fecha_creacion = date('d-m-Y', strtotime($created_at));
            $updated_at = $publicacion[0]->updated_at;
            return view('publicaciones.new_publicacion', compact('id', 'nombre_autor', 'fecha_creacion' , 'titulo', 'categoria', 'color_categoria', 'imagen', 'contenido', 'tags', 'created_at', 'updated_at'));
        }
    }

    public function ViewAdministracion()
    {
        return view('cuenta.administracion.panel_administracion');
    }

    public function ViewAdminRedactores()
    {
        return view('cuenta.administracion.admin_redactores');
    }

    public function ViewAdminLectores()
    {
        return view('cuenta.administracion.admin_lectores');
    }

    public function ViewAdminPublicaciones()
    {
        return view('cuenta.administracion.admin_posts');
    }

    public function ViewAdminComentarios()
    {
        return view('cuenta.administracion.admin_comentarios');
    }
}
