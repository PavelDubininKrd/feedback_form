<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\TopicDict;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() {
        $topics = TopicDict::all();
        return view('index', compact('topics'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $request->file->store('files');
        Feedback::create($data);

        return redirect()->back();
    }
}