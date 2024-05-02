@extends('layouts.app')

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Answers</title>
    </head>

    <body>

        <div class="container bg-light">
            <div class="d-flex" style="height: 100px;"></div>
            <p>Created at: {{ $question->created_at->format('H:i:s d-m-Y') }}</p>
            <p class=" h1 text-center ">{{ $question->object }}</p>
            <h3 class="text center mb-5">{{ $question->description }}</h3>
            @foreach ($answers as $answer)
                <div class="border rounded mt-3 p-4" style="backgroung-color: #FFF;" >
                    <div class="card-body" >
                        <p class="lead">Answered at: {{ $answer->created_at->format('H:i:s d-m-Y') }}</p>
                        <p class="lead ms-5">{{ $answer->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </body>

    </html>
@endsection
