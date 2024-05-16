@extends('layouts.app')

@section('content')
    <div class="alert alert-success">
        <h1 class="text-center">Thank you for your purchase!</h1>
        <p class="text-center">Your order number is: <strong>{{ $order->id }}</strong></p>
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue shopping</a>
    </div>
@endsection
