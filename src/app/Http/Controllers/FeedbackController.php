<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Feedback';

        return view('feedback', compact('title'));
    }

    public function create(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $rating = $request->rating;
        $message = $request->message;
        $additionalRatings = json_encode($request->additional_ratings);

        if ($request->file('attachment')) {
            $attachmentUrl = $this->uploadAttachment($request->file('attachment'));
        }

        DB::unprepared("INSERT INTO feedbacks (name, email, rating, message, additional_ratings, attachment_url) value ('$name', '$email', '$rating', '$message', '$additionalRatings', '$attachmentUrl')");

        return redirect()
            ->route('home')
            ->with('success', 'Thank you for your feedback! We will strive to serve you better!');
    }

    private function uploadAttachment(UploadedFile $imageFile)
    {
        $extension = $imageFile->extension();
        $filePath = Feedback::DEFAULT_FEEDBACK_ATTACHMENTS_FOLDER . uniqid() . '-' . md5($imageFile->path()) . '-' . strtotime("now") . '.' . $extension; 
        $imageFile->storeAs('/public', $filePath);

        return Storage::url($filePath);            
    }
}