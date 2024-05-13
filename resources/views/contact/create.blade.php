@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="col-xl-10 mb-5 product-card mx-auto">
            <h1 class="text-center mt-3 mb-5">Question</h1>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="object" class="form-label">Object</label>
                    <input type="text" class="form-control" id="object" name="object" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
