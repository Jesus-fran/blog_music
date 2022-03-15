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
        $publicacion = DB::table('posts')->select('titulo', 'contenido', 'imagen', 'tags', 'created_at', 'updated_at')->where('id', '=', $id)->get();
        if ($publicacion->isEmpty()) {
            return redirect(404);
        } else {
            $titulo = $publicacion[0]->titulo;
            $contenido = $publicacion[0]->contenido;
            $imagen = asset($publicacion[0]->imagen);
            $tags = $publicacion[0]->tags;
            $created_at = $publicacion[0]->created_at;
            $updated_at = $publicacion[0]->updated_at;
            return view('publicaciones.new_publicacion', compact('id', 'titulo', 'imagen', 'contenido', 'tags', 'created_at', 'updated_at'));
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
