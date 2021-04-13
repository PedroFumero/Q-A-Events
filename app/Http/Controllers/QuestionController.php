<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;

class QuestionController extends Controller
{
    public function create() {
        return view('question.create');
    }

    public function store(Request $request) {
        $question = new Question;
        $question->content = $request->content;
        $question->FK_USER = Auth::user()->id;
        $question->save();
        return redirect()->route('home')->withSuccess($question);
    }
}
