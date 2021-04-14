@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold text-center">Write your question</div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf

                        <div class="input-group input-group-lg mb-3">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                          <input id="content" type="hidden" name="content">
                          <trix-editor input="content" class="col-12" placeholder="Body question"></trix-editor>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary">Send question</button>
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