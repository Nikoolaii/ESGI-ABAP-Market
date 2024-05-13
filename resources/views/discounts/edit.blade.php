@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Edit discount</h1>
            <p class="text-gray-500">Edit discount {{$discount->name}}</p>
            <a href="{{route('discounts.index')}}">
                <button class="btn btn-primary">Go back</button>
            </a>
        </div>
        <form action="{{route('discounts.update', $discount->id)}}" method="post">
            <div class="flex flex-col mb-4 p-4">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <label for="code">Name</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{$discount->code}}">
                </div>
                <div class="form-group my-2">
                    <label for="value">Discount</label>
                    <input type="text" class="form-control" id="value" name="value"
                           value="{{$discount->value}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
