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
}