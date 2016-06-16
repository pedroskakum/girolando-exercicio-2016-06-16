<?php

namespace Segundo\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Segundo\Http\Requests;

class DashboardController extends Controller
{
    public function index(){

        if (Session::has('idUsuario')) {
            return view('dashboard');
        }
        return Redirect::route('index')->with('flash_error', 'Essa página só pode ser acessada por usuários autenticados.')->withInput();
        
        
    }
}