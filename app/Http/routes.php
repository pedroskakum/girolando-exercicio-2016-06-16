<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//onde será exibido o formulário para login
Route::resource('/', 'HomeController', ['only' => ['index'] ]);

//onde irá receber os dados do formulário para realização do login
Route::resource('/autenticar', 'LoginController', ['only' => ['store']]);


//onde será exibido o Bem vindo FULANO DE TAL! e um link [SAIR]
Route::resource('/dashboard', 'DashboardController', ['only' => ['index']]);

//onde irá "desautenticar" o usuário e redirecionar ele pra /
Route::resource('/sair', 'LogoutController', ['only' => ['index']]);

