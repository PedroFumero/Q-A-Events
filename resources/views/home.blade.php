@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold text-center">List of questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    @if (count($questions) > 0)
                      <div class="text-right mb-3">
                        <a href="{{ route('questions.create') }}" class="btn btn-primary">Ask a question</a>
                      </div>
                      <ul class="list-group">
                        @foreach ($questions as $question)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a>
                            
                            <div class="small text-secondary">
                              <i class="fa fa-user-o" aria-hidden="true"></i>
                              by: {{ $question->user->name }}
                            </div>
                          </li>
                          {{-- <hr> --}}
                        @endforeach
                      </ul>
                    @else
                        <p class="text-center">There are no questions yet</p>
                        <hr>
                        <div class="text-right">
                            <a href="{{ route('questions.create') }}" class="btn btn-primary">Ask a question</a>
                        </div>
                    @endif

            

                    @if( Session::has( 'success' ))
                      @php
                          alert()->info('Question pending for approval','A moderator will review your question and approve.');
                      @endphp
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
