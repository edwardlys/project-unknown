<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $title = 'Register';

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('register')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
            
            list($name, $emailDomain) = explode('@', $request->email);

            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if ($user) {
                return redirect()
                    ->route('home')
                    ->with('success', 'Account has been created! Please login with your credentials');
            }

            return redirect()
                ->route('register')
                ->withInput($request->input())
                ->with('success', 'Unable to create new account at the moment, please contact the system administrators');
        }

        return view('auth.register', compact('title'));
    }

    public function login(Request $request)
    {
        $title = 'Login';

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('login')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }

            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
    
                return redirect()
                    ->route('home')
                    ->with('success', 'Login successful!');
            }
    
            return redirect()
                ->back()
                ->with('error', 'Credentials does not match with any account in our system');
        }

        return view('auth.login', compact('title'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('home')
            ->with('success', 'Logged out!');
    }
}