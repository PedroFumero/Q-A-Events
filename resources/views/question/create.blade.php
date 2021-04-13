@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write your question</div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" class="form-control" placeholder="How can I do..." name="content">
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
