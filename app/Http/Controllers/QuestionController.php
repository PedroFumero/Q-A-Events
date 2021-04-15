<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Auth;

class QuestionController extends Controller
{

    public function __construct() {
      $this->middleware('auth');
    }

    public function create() {
        return view('question.create');
    }

    public function store(Request $request) {

        $request->validate([
          'title' => 'required|min:10',
        ]);

        $question = new Question;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->FK_USER = Auth::user()->id;
        $question->save();
        return redirect()->route('home')->withSuccess($question);
    }

    public function show(Question $question, Request $request) {
      $answers = Answer::where('FK_QUESTION', $question->id)->get();
      return view('question.show', ['question' => $question, 'answers' => $answers, 'page' => $request->page]);
    }

    public function answer(Request $request) {

      $request->validate([
        'content' => 'required|min:2',
      ]);

      $answer = new Answer;
      $answer->content = $request->content;
      $answer->FK_QUESTION = $request->question;
      $answer->FK_USER = Auth::user()->id;
      $answer->save();
      return redirect()->back();
    }

    public function pendings() {
      if(Auth::user()->FK_ROLE != 1) {
        return redirect()->route('home');
      }
      $questions = Question::where('status', 'pending')->get();
      return view('question.pendings', ['questions' => $questions]);
    }

    public function denied() {
      if(Auth::user()->FK_ROLE != 1) {
        return redirect()->route('home');
      }
      $questions = Question::where('status', 'denied')->get();
      return view('question.denied', ['questions' => $questions]);
    }

    public function deny(Question $question) {
      
      $question->status = 'denied';
      $question->save();
      return redirect()->route('questions.pendings');
    }

    public function approve(Request $request) {

      $request->validate([
        'content' => 'required|min:2',
      ]);

      $question = Question::find($request->question);
      $question->status = 'approved';
      $question->save();

      $this->answer($request);
      // return [$request->content, $request->question];
      return redirect()->route('questions.pendings');
    }
}
