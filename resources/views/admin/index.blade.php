@extends('layouts.app')

@section('content')

    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Dashboard</h1>
            <p class="text-gray-500">Welcome back, {{ auth()->user()->name }}</p>
        </div>

        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Redirect link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($elementToManage as $category)
                    <tr>
                        <th scope="row">{{ $category['name'] }}</th>
                        <td><a href="{{ route($category['route']) }}">
                                <button class="btn btn-primary btn-lg active">Redirect</button>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
