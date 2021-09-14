<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';

        return view('profile', compact('title'));
    }
}