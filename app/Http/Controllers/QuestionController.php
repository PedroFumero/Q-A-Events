<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Auth;

class QuestionController extends Controller
{
    public function create() {
        return view('question.create');
    }

    public function store(Request $request) {
        $question = new Question;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->FK_USER = Auth::user()->id;
        $question->save();
        return redirect()->route('home')->withSuccess($question);
    }

    public function show(Question $question) {
      $answers = Answer::where('FK_QUESTION', $question->id)->get();
      return view('question.show', ['question' => $question, 'answers' => $answers]);
    }

    public function answer(Request $request) {
      $answer = new Answer;
      $answer->content = $request->content;
      $answer->FK_QUESTION = $request->question;
      $answer->FK_USER = Auth::user()->id;
      $answer->save();
      return redirect()->back();
    }
}
