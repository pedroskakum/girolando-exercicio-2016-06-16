<?php

namespace Segundo\Http\Controllers;

use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Segundo\Http\Requests;

class LoginController extends Controller
{
    private $databaseManager;

    public function __construct(DatabaseManager $databaseManager){
        $this->databaseManager = $databaseManager;
    }
    
    public function index(){
        
    }

    public function store(Request $request){

        $telefoneUsuario = $request->all()['telefoneUsuario'];
        $passwordUsuario = $request->all()['password'];//senha pura digitada

        $usuario = $this->databaseManager
            ->table('usuarios')
            ->where("telefoneUsuario", $telefoneUsuario)
            ->first();


        if ($usuario && Hash::check($passwordUsuario, $usuario->password)) {

            Session::put('idUsuario',       $usuario->idUsuario);
            Session::put('nomeUsuario',     $usuario->nomeUsuario);
            Session::put('emailUsuario',    $usuario->emailUsuario);
            Session::put('telefoneUsuario', $usuario->telefoneUsuario);
            Session::put('statusUsuario',   $usuario->statusUsuario);

            return Redirect::route('dashboard.index');
        }

        return Redirect::route('index')->with('flash_error', 'Sua combinação telefone/password está incorreta.')->withInput();
    }
}
