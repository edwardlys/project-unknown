<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Feedback';

        return view('feedback', compact('title'));
    }

    public function create(Request $request)
    {
        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Thank you for your feedback! We will strive to serve you better!');
    }
}