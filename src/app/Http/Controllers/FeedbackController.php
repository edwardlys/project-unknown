<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Feedback';

        return view('feedback', compact('title'));
    }

    public function create(Request $request)
    {
        $name = $request->email;
        $email = $request->email;
        $rating = $request->rating;
        $message = $request->message;
        
        DB::unprepared("INSERT INTO feedbacks (name, email, rating, message) value ('$name', '$email', '$rating', '$message')");

        return redirect()
            ->route('home')
            ->with('success', 'Thank you for your feedback! We will strive to serve you better!');
    }
}