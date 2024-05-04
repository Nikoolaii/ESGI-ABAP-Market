@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Categories</h1>
            <p class="text-gray-500">All categories</p>
            <a href="{{route('admin.index')}}">
                <button class="btn btn-primary btn-lg active">Go back</button>
            </a>
            <a href="{{route('categories.create')}}">
                <button class="btn btn-primary btn-lg active mx-1">Create category</button>
            </a>
        </div>
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="{{ route('categories.edit', $category) }}">
                                    <button class="btn btn-primary btn-lg active p-1">Edit</button>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg active p-1">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
