@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Edit category</h1>
            <p class="text-gray-500">Edit category {{$category->name}}</p>
            <a href="{{route('categories.index')}}">
                <button class="btn btn-primary">Go back</button>
            </a>
        </div>
        <form action="{{route('categories.update', $category->id)}}" method="post">
            <div class="flex flex-col mb-4 p-4">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
