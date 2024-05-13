@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="col-xl-10 mb-5 product-card mx-auto">
            <h1 class="text-center mt-3 mb-5">Contact</h1>
            <div class="row">
                <div class="input-group mb-1">
                    <div class="input-group">
                        <a href="{{ route('contact.create') }}" class="btn btn-primary w-100 my-2">Ask a question</a>
                    </div>
                </div>
                <div class="accordion mt-1" id="accordionExample faqContainer">
                    @foreach ($questions as $key => $question)
                        <div class="accordion-item faq-card mb-3 shadow shadow-lg rounded"
                             data-category="{{ $question->category }}">
                            <h2 class="accordion-header">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $question->id }}"
                                        aria-expanded=" {{ $key === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $question->id }}">
                                    {{ $question->object }}
                                </button>
                            </h2>
                            <div id="collapse{{ $question->id }}"
                                 class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Created at: {{ $question->created_at->format('H:i:s d-m-Y') }}</p>
                                    <p class="lead">{{ $question->description }}</p>
                                </div>
                                <div class="d-flex flex-row justify-content-center">
                                    @php
                                        $hasAnswer = false;
                                    @endphp
                                    @foreach ($answers as $answer)
                                        @if ($answer->faq_id === $question->id)
                                            @php
                                                $hasAnswer = true;
                                                break;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($hasAnswer)
                                        <form action="{{ route('contact.show', $question->id) }}" method="get">
                                            @csrf
                                            <div class="mx-auto text-center mb-2">
                                                <input type="submit" class="btn btn-primary" value="Show Answers">
                                            </div>
                                        </form>
                                    @else
                                        <div class="accordion-body text-center">
                                            Nobody answered
                                        </div>
                                    @endif
                                    <form action="{{route('faqAnswer.create', $question->id)}}" method="get">
                                        @csrf
                                        <div class="mx-auto text-center mb-2">
                                            <input type="submit" class="btn btn-primary" value="Answer">
                                        </div>
                                    </form>
                                    @if(isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
                                        <form action="{{ route('contact.destroy', $question->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mx-auto text-center mb-2">
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5 "> {{ $questions->links('vendors.pagination.custom') }}
            </div>

        </div>
    </div>
@endsection
