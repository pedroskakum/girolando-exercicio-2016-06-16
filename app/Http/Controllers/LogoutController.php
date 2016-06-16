<?php

namespace Segundo\Http\Controllers;

use Illuminate\Http\Request;

use Segundo\Http\Requests;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->clear();
        return redirect(route('index'));
    }
}
