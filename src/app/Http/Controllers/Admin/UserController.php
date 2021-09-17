<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'User Management';
        
        Auth::user()->email;

        $search = $request->input('search', null);

        if ($search) {
            $users = User::where('email', '!=', Auth::user()->email)
                ->where('email', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $users = User::where('email', '!=', Auth::user()->email)->get();
        }

        return view('admin.users.index', compact('title', 'users', 'search'));
    }

    public function makeAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect()
            ->back()
            ->with('success', 'User ' . $user->name . ' is now an admin');
    }

    public function removeAdmin(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return redirect()
            ->back()
            ->with('success', 'User ' . $user->name . ' is no longer an admin');
    }
}