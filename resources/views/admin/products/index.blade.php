@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Products</h1>
            <p class="text-gray-500">All products</p>
            <a href="{{ route('admin.index') }}">
                <button class="btn btn-primary btn-lg active">Go back</button>
            </a>
            <a href="{{route('admin.products.create')}}">
                <button class="btn btn-primary btn-lg active mx-1">Create product</button>
            </a>
        </div>
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->name }}</th>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="{{ route('admin.products.edit', $product) }}">
                                    <button class="btn btn-primary btn-lg active m-1">Edit</button>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg active m-1">Delete</button>
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
