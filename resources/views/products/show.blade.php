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
                                <img src="{{ $product->image }}" class='img-fluid' style="height: 300px; width: auto;"
                                     alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <div class="col-xl-8 col-sm">
                            <h1 class="card-title pb-1">{{ $product->name }}</h1>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <p class='lead' style="font-size: 28px;">Price of the product, <b>{{ $product->price }}€</b></p>
                        <div class='d-flex' style='height: 20px;'></div>
                        <hr>
                        <div class='d-flex' style='height: 20px;'></div>
                        <hr>
                        <p class='h3 text-dark'>Description</p>
                        <div class='d-flex' style='height: 20px;'></div>
                        <p class='lead ps-3' style="font-size:20px;">{{ $product->description }}</p>
                        <div class='d-flex' style='height: 20px;'></div>
                    </div>
                    <div class='d-flex' style='height: 20px;'></div>
                    <hr>
                    <hr>
                    <div class='col-xl-11 col-sm mx-auto'>
                        <div class='d-flex' style='height: 20px;'></div>

                        <div class='d-flex' style='height: 20px;'></div>
                        <p class='h3 text-dark'>Disponibility : {{ $product->stock}}  {{ $product->name }} in stock
                            !</p>
                        <div class='d-flex' style='height: 20px;'></div>
                    </div>

                    <?php
                    ?>

                    <div class='d-flex' style='height: 50px;'></div>
                    <a href="" class="btn btn-primary btn-lg py-4">Add to cart</a>
                </div>
                <div class='d-flex' style='height: 50px;'></div>
                <div class="col-xl-6 col-sm mx-auto text-center">
                    <a href="/" class="btn btn-primary btn-lg">Return to homepage</a>
                </div>
                <div class='d-flex' style='height: 200px;'></div>
            </div>
        </div>
@endsection
