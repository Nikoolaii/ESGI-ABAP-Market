@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="d-flex mt-4"></div>
        <h3>{{ $question->object }}</h3>
        <h4 class="text center">{{ $question->description }}</h4>
        <p class="mb-2">Created at: {{ $question->created_at->format('H:i:s d-m-Y') }}</p>
        <a href="{{ route('contact.index') }}" class="btn btn-primary">Back</a>
        @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
            <a href="{{ route('contact.destroy', $question->id) }}" class="btn btn-danger mx-2">Delete</a>
        @endif
        @foreach ($answers as $answer)
            <div class="border rounded mt-3 p-4 bg-white">
                <div class="card-body">
                    <p class="lead">{{$answer->user->name}} - {{ $answer->created_at->format('H:i:s d-m-Y') }}</p>
                    <p>{{ $answer->answer }}</p>
                    @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
                        <a href="{{ route('faqAnswer.destroy', $answer->id) }}" class="btn btn-danger">Delete</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
