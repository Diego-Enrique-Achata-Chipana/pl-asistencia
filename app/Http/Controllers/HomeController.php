<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::select('nombre')->first();
        return view('home',compact('usuario'));
    }

    public function admin()
    {
        $usuario = User::select('nombre')->first();
        return view('layouts.admin',compact('usuario'));
    }
}
