@extends('layouts.app')

@section('content')
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product</title>
    </head>
    <body>

    </body>
    </html>
    <div class="container">
        <div class="col-xl-11 mx-auto">
            <div class="d-flex" style="height: 100px;"></div>
            <?php

            ?>
            <div class="col-xl-12">
                <div class='card shadow-lg col-sm border pt-5'>
                    <div class='col-xl-11 col-sm mx-auto'>
                        <div class="col-xl">
                            <div class='d-flex' style='height: 20px;'></div>
                            <div class="mx-auto text-center">
                                <img src="../../{{ $product->image }}" class='img-fluid'
                                     style="height: 300px; width: auto;"
                                     alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <div class="col-xl-8 col-sm">
                            <h1 class="card-title pb-1">{{ $product->name }}</h1>
                            @if ($product->stock > 0)
                                <p class="text-success">In stock</p>
                            @else
                                <p class="text-danger">Out of stock</p>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <p class='lead' style="font-size: 28px;">Price: <b>{{ $product->price }}€</b></p>
                        <hr>
                        <p class='h3 text-dark'>Description</p>
                        <p class='lead' style="font-size:20px;">{{ $product->description }}</p>
                    </div>
                    <hr>
                    <form action="{{ route('basket.store') }}" method="post" class="mb-4">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="col-xl-11 col-sm mx-auto">
                            <div class="col-xl-6 col-sm mx-auto">
                                <p>Stock : {{ $product->stock}}</p>
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1"
                                       max="{{ $product->stock }}" min="1">
                            </div>
                            <div class="d-flex" style="height: 20px;"></div>
                            <div class="col-xl-6 col-sm mx-auto">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Add to basket</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='d-flex' style='height: 50px;'></div>
                <div class="col-xl-6 col-sm mx-auto text-center">
                    <a href="/" class="btn btn-primary btn-lg">Return to homepage</a>
                </div>
                <div class='d-flex' style='height: 200px;'></div>
            </div>
        </div>
@endsection
