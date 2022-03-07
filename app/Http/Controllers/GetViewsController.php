<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetViewsController extends Controller
{
    public function ViewHome()
    {
        return view('index');
    }

    public function ViewMiCuenta()
    {
        return view('cuenta.mi_cuenta');
    }

    public function ViewRegistrarse()
    {
        return view('cuenta.registrar.registrar_usuario');
    }

    public function ViewPublicaciones()
    {
        return view('publicaciones.publicacion');
    }

    public function ViewCrearPublicacion()
    {
        return view('publicaciones.crear.crear_publicacion');
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
