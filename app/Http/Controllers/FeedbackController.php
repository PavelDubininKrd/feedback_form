<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\StoreFeedback;
use App\Mail\MailSend;
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
        Mail::to('pavel-d.job@yandex.ru')->send(new MailSend());
        $validated = $request->validated();
        return response()->json($request->all());
    }
}
