@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <p>{{ $question }}</p>
                        @endforeach
                    @else
                        <p class="text-center">There are no questions yet</p>
                        <hr>
                        <div class="text-right">
                            <a href="{{ route('questions.create') }}" class="btn btn-primary">Ask a question</a>
                        </div>
                    @endif



                    @if( Session::has( 'success' ))
                        Here we're getting a flash message to build notification of pending
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
