<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';

        $menuItems = MenuItem::all();

        return view('home', compact('title', 'menuItems'));
    }
}