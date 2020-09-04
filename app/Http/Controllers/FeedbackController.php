<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\StoreFeedback;
use App\Mail\FeedbackMail;
use App\TopicDict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index() {
        $topics = TopicDict::all();
        return view('index', compact('topics'));
    }

    public function store(StoreFeedback $request) {
        $validatedData = $request->validated();

        if ($request->file !== 'undefined') {
            $file = (new \App\Feedback)->storeFile($request->file);
            $validatedData['file'] = $file;
        } else {
            $validatedData['file'] = null;
        }
        Mail::to('companyEmail@gmail.ru')->send(new FeedbackMail($validatedData));
        Feedback::create($validatedData);

        return response()->json($request->all());
    }
}
