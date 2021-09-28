<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        
        $name = $request->email;
        $email = $request->email;
        $password = $request->password;
        
        DB::unprepared("INSERT INTO users (name, email, password) value ('$name', '$email', '$password')");
       
        $userId = User::where('email', $email)->first()->id;
        $phone = $request->phone;
        $address = $request->address;

        if ($userId && $phone && $address) {
            DB::unprepared("INSERT INTO profiles (user_id, phone, `address`) value ('$userId', '$phone', '$address')");
        }

        return redirect()
            ->route('home')
            ->with('success', 'Account has been created! Please login with your credentials');
    }
}