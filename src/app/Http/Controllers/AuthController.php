<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $title = 'Register';

        if ($request->isMethod('post')) {
        
        }

        return view('auth.register', compact('title'));
    }

    public function login(Request $request)
    {
        $title = 'Login';

        if ($request->isMethod('post')) {
        
        }

        return view('auth.login', compact('title'));
    }
}