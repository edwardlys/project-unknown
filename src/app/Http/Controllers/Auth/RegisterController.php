<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';

        return view('auth.register', compact('title'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
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
            ->with('error', 'Unable to create new account at the moment, please contact the system administrators');
    }
}