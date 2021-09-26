<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackManagementController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Orders Management';
        
        $feedbacks = Feedback::all();

        return view('admin.feedbacks.index', compact('title', 'feedbacks'));
    }
}