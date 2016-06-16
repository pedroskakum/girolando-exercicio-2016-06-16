<?php

namespace Segundo\Http\Controllers;

use Illuminate\Http\Request;

use Segundo\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
