<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'Login';

        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->whereRaw('email = "' . $request->email . '"')
            ->whereRaw('password = "' . $request->password . '"')
            ->first();

        if (!empty($user)) {
            $userModel = User::find($user->id);

            Auth::login($userModel);

            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('success', 'Login successful!');
        }

        return redirect()
            ->back()
            ->with('error', 'Credentials does not match with any account in our system');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('home')
            ->with('success', 'Logout successful!');
    }
}