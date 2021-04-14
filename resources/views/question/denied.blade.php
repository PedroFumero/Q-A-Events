@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold text-center">List of denied questions ({{ count($questions) }})</div>

                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($questions) > 0)
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Question</th>
                            <th>Date</th>
                            <th>Author</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($questions as $question)
                            <tr>
                              <th><a href="{{ route('questions.show', [$question->id, 'page' => 'denied']) }}">{{ $question->title }}</a></th>
                              <td>{{ $question->created_at }}</td>
                              <td>{{ $question->user->name }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                    @else
                        <p class="text-center">There are no questions yet</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
