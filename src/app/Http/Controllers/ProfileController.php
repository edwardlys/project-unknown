<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        
        $user = Auth::user();

        if (!$profile = $user->profile) {
            $profile = $user->profile()->create();
        }
        
        return view('profile.index', compact('title', 'user', 'profile'));
    }

    public function updatePage()
    {
        $title = 'Profile update';

        $user = Auth::user();

        if (!$profile = $user->profile) {
            $profile = $user->profile()->create();
        }

        return view('profile.update', compact('title', 'profile'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'string',
            'last_name' => 'string',
            'date_of_birth' => 'date_format:Y-m-d',
            'phone' => 'string',
            'address' => 'string'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $profile = Auth::user()->profile;

        if ($request->first_name) {
            $profile->first_name = $request->first_name;
        }

        if ($request->last_name) {
            $profile->last_name = $request->last_name;
        }

        if ($request->date_of_birth) {
            $profile->date_of_birth = $request->date_of_birth;
        }

        if ($request->phone) {
            $profile->phone = $request->phone;
        }

        if ($request->address) {
            $profile->address = $request->address;
        }

        $profile->save();

        return redirect()
            ->route('profile')
            ->with('success', 'Profile information updated!');
    }
}