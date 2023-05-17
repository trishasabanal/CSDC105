<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function userHome()
    {
        return view('home',["msg"=>"I am a User."]);
    }

    public function adminHome()
    {
        if (Auth::user()->isAdmin()) {
            return redirect('/');
        } else {
            return view('admin.home');
        }
    }
}