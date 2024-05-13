@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Create a discount</h1>
            <a href="{{ route('discounts.index') }}">
                <button class="btn btn-primary mx-1">Go back</button>
            </a>
        </div>
        <form action="{{ route('discounts.store') }}" method="POST">
            <div class="flex flex-col mb-4 p-4">
                @csrf
                <div class="form-group my-2">
                    <label for="code" class="sr-only">Code</label>
                    <input type="text" name="code" id="code" placeholder="Code"
                           class="form-control @error('code') border-red-500 @enderror"
                           value="{{ old('code') }}">
                    @error('code')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="value" class="sr-only">Value</label>
                    <input type="number" name="value" id="value" placeholder="Value"
                           class="form-control @error('value') border-red-500 @enderror"
                           value="{{ old('value') }}">
                    @error('value')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="expires_at" class="sr-only">Expires At</label>
                    <input type="date" name="expires_at" id="expires_at" placeholder="Expires At"
                           class="form-control @error('expires_at') border-red-500 @enderror"
                           value="{{ old('expires_at') }}">
                    @error('expires_at')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg">Create
                        Discount
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
