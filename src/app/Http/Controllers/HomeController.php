<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Home';

        $id = $request->input('id');
        $pw = $request->input('pw');
        // if (!empty($id)) {
        //     $user =  DB::table('users')
        //         ->select('*')
        //         ->whereRaw('id = ' . $id)
        //         ->whereRaw('password = "' . $pw . '"')
        //         ->first();

        //     if (!empty($user)) {
        //         echo "I AM LOGGED IN";
        //     } else {
        //         echo "WRONG PASSWORD";
        //     }
        // }


        // if (!empty($id)) {
        //     $user =  DB::table('users')
        //         ->select('*')
        //         ->whereRaw('id = ' . $id)
        //         ->first();

        //     if (!empty($user)) {
        //         if ($user->password == $pw) {
        //             echo "i am logged in";
        //             die();
        //         }
        //     } 

        //     echo "wrong password";
        //     die();
        // }


        return view('home', compact('title'));
    }
}