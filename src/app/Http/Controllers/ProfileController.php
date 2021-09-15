<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        
        $user = Auth::user();

        if (!$profile = $user->profile) {
            $profile = $user->profile()->create();
        }
        
        return view('profile', compact('title', 'user', 'profile'));
    }
}