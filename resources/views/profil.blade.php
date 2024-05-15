@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 shadow-md">
            <h1>Your profil</h1>
            <div class="d-flex flex-row p-2">
                <div class="w-50 border border-dark rounded m-2 p-2">
                    <h4>User info</h4>
                    <p><b>User id: </b> {{ Auth::user()->id }}</p>
                    <p><b>User name: </b> {{ Auth::user()->name }}</p>
                    <p><b>User email: </b> {{ Auth::user()->email }}</p>
                    <p><b>Created at: </b> {{ Auth::user()->created_at }}</p>
                </div>
                <div class="w-50 border border-dark rounded m-2 p-2 ">
                    <h4>Change password</h4>
                    <form action="{{ route('profil.update', Auth::user()) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-xl-8 col-sm mx-auto text-center">
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                                <input type="password" name="password" id="password" class="form-control mt-1 block w-full"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                                    new
                                    password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control mt-1 block w-full" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border border-dark rounded m-3 p-4">
                <h4>Your orders</h4>
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Update at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}">
                                        <button class="btn btn-primary btn-sm active">Show</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
