@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <a href="{{route('admin.index')}}">Go back</a>

        <h1 class="text-2xl font-medium mb-1">Products</h1>
        <p class="text-gray-500">All products</p>
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
                        <a href="{{ route('products.edit', $product) }}"><button class="btn btn-primary btn-lg active">Edit</button></a>
                        <form action="{{ route('products.destroy', $product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg active">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
