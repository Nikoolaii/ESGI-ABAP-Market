@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Order</h1>
            <p class="text-gray-500">Order details n°{{$order->id}}</p>
            @if(Request::is('admin/*'))
                <a href="{{ route('orders.index') }}">
                    <button class="btn btn-primary btn-lg active">Go back</button>
                </a>
            @else
                <a href="{{ route('profil') }}">
                    <button class="btn btn-primary btn-lg active">Go back</button>
                </a>
            @endif

        </div>
        <div class="d-flex flex-row p-2">
            <div class="w-50 border border-dark rounded m-2 p-2">
                <h4>User info</h4>
                <p>User id: {{$order->user_id}}</p>
                <p>User name: {{$order->user->name}}</p>
                <p>User email: {{$order->user->email}}</p>
                <p>Created at: {{$order->user->created_at}}</p>
            </div>
            <div class="w-50 border border-dark rounded m-2 p-2">
                <h4>Order info</h4>
                <p>Order id: {{$order->id}}</p>
                <p>Total: {{$order->total}}</p>
                <p>Status: {{$order->status}}</p>
                <p>Created at: {{$order->created_at}}</p>
                <p>Update at: {{$order->updated_at}}</p>
            </div>
        </div>
        @if(Request::is('admin/*'))
            <div class="border border-dark rounded m-3 p-4">
                <h4>Edit status</h4>
                <form action="{{route('orders.update', $order->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending" {{$order->status == 'pending' ? 'selected' : ''}}>Pending</option>
                            <option value="processing" {{$order->status == 'processing' ? 'selected' : ''}}>Processing
                            </option>
                            <option value="completed" {{$order->status == 'completed' ? 'selected' : ''}}>Completed
                            </option>
                            <option value="declined" {{$order->status == 'declined' ? 'selected' : ''}}>Declined
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg active">Update</button>
                </form>
            </div>
        @endif
        <div class="text-center">
            <h4>Order items</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $product)
                    <tr>
                        <th scope="row">{{$product->product_id}}</th>
                        <td>{{$product->product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity * $product->price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
