@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="col-xl-10 mb-5 product-card mx-auto">
            <h1 class="text-center mt-3 mb-5">Answer</h1>
            <form action="{{ route('faqAnswer.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <p><b>Question:</b> {{ $faq->object }}</p>
                    <p><b>Description:</b> {{ $faq->description }}</p>
                    <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
