@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold title-question ">
                  <div class="row d-flex align-items-center">
                    <div class="col-8">
                      <i class="fa fa-question-circle" aria-hidden="true"></i> {{ $question->title }}
                    </div>
                    <div class="col-4">
                      <div class="text-primary">
                        <p class="mb-0 small"><i class="fa fa-user-o" aria-hidden="true"></i> by: {{ $question->user->name }}</p>
                        <hr>
                        <p class="mb-0 small"><i class="fa fa-calendar" aria-hidden="true"></i> on: {{ $question->created_at }}</p>
                      </div>
                    </div>
                  </div>
                  
                </div>

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

                    @if ($page !== 'denied')
                      <hr>
                      <p class="text-center text-secondary">Would you like to give an answer?</p>
                      <form action="{{ $page === 'pending' ? route('questions.approve', $question) : route('questions.answer', $question) }}" method="post">
                          @csrf
                          @if ($page === 'pending')
                            @method('put')
                          @endif
                          <div class="input-group mb-3">
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content" class="col-12 @error('content') border border-danger @enderror" placeholder="Write a complete answer..."></trix-editor>
                            @error('content')
                              <span class="small text-danger mt-1">
                                  <strong>You need to provide an answer</strong>
                              </span>
                            @enderror
                          </div>

                          

                          <div class="text-right">
                            @if($page === 'pending')
                              <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Approve answer</button>
                            @else
                              <button class="btn btn-primary" type="submit">Send answer</button>
                            @endif
                            <hr>
                          </div>
                    @endif
                    </form>
                    <div>
                      @if ($page === 'pending')      
                          <form action="{{ route('questions.deny', $question) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Deny</button>
                          </form>               
                      @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/trix.js') }}"></script>
@endsection