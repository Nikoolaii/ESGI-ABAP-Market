@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="d-flex mt-4"></div>
        <h3>{{ $question->object }}</h3>
        <h4 class="text center">{{ $question->description }}</h4>
        <p class="mb-5">Created at: {{ $question->created_at->format('H:i:s d-m-Y') }}</p>
        <a href="{{ route('contact.index') }}" class="btn btn-primary">Back</a>
        @foreach ($answers as $answer)
            <div class="border rounded mt-3 p-4 bg-white">
                <div class="card-body">
                    <p class="lead">{{$answer->user->name}} - {{ $answer->created_at->format('H:i:s d-m-Y') }}</p>
                    <p>{{ $answer->answer }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
