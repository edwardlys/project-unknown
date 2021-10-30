<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewsletterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NewsletterManagementController extends Controller
{
    public function createPage()
    {
        $title = 'Create Newsletter';
        
        return view('admin.newsletter.form', compact('title'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $users = User::where('is_admin', false)->get();

        $totalUsers = $users->count();
        $totalMailFail = 0;

        foreach ($users as $user) {
            try {
                Mail::to($user->email)
                    ->send(new NewsletterMail($request->input('title'), $request->input('description'), $user->name)); 
            } catch (\Exception $e) {
                $totalMailFail++;
            }
        }

        $totalMailSent = $totalUsers - $totalMailFail;

        return redirect()
            ->route('home')
            ->with('success', "Emails sent to $totalMailSent / $totalUsers users!");
    }
}