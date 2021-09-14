<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $title = 'Home';

        return view('home', compact('title'));
    }
}