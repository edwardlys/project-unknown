<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        $title = 'Home';

        return view('home', compact('title'));
    }

    public function register()
    {
        $title = 'Register';

        return view('auth.register', compact('title'));
    }

    public function login()
    {
        $title = 'Login';

        return view('auth.login', compact('title'));
    }
}