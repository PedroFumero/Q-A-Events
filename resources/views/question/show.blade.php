@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold title-question "><i class="fa fa-question-circle" aria-hidden="true"></i> {{ $question->title }}</div>

                <div class="card-body">
                  
                  <div class="trix-content content-question">{!! $question->content !!}</div>
                    
                    <hr>
                  
                    @if (count($answers) > 0)
                        @foreach ($answers as $answer)
                            <div class="card p-3 rounded mb-3">
                              {!! $answer->content !!}
                              <hr>

                              <div class="d-flex justify-content-between text-secondary">
                                <p class="mb-0 small"><i class="fa fa-user-o" aria-hidden="true"></i> by: {{ $answer->user->name }}</p>
                                <p class="mb-0 small"><i class="fa fa-calendar" aria-hidden="true"></i> on: {{ $answer->created_at }}</p>
                              </div>

                               
                            </div>
                        @endforeach
                    @endif

                    <hr>

                    <p class="text-center text-secondary">Would you like to give an answer?</p>
                    <form action="{{ route('questions.answer', $question) }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                          <input id="content" type="hidden" name="content">
                          <trix-editor input="content" class="col-12" placeholder="Write a complete answer..."></trix-editor>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary">Send answer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/trix.js') }}"></script>
@endsection