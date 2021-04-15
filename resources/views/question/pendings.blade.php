@extends('layouts.app')

@section('title', 'Pendings - Q&A Event')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold text-center">Pendings for approval ({{ count($questions) }})</div>
                <div class="card-body">
                    @if (count($questions) > 0)
                      <ul class="list-group">
                        @foreach ($questions as $question)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a>
                            <div class="small text-secondary">         
                              <a class="btn btn-outline-primary mr-2" href="{{ route('questions.show', $question->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> Review</a>
                              <form class="d-inline-block" action="{{ route('questions.deny', $question) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-outline-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Deny</button>
                              </form>   
                          </li>
                        @endforeach
                      </ul>
                    @else
                        <p class="text-center">There are no questions yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
