<?php

namespace App\Http\Controllers;

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
        Mail::to('useremail@yandex.ru')->send(new FeedbackMail);
        $validated = $request->validated();
        return response()->json($request->all());
    }
}
