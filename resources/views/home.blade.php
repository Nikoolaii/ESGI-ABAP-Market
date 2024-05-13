@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row justify-content-center">
            <img src="{{ asset('img/AbapMarket.png') }}" alt="ABAP Marketing" class="img-fluid">
            <div class="col-xl-12">
                @if(isset($discount))
                    <h1 class="text-center bg-dark text-light py-2">Purchase with the code {{ $discount->code }} and
                        obtain a discount of {{ $discount->value }} %</h1>
                @endif
            </div>
            <div class="row d-flex justify-content-around mt-4">
                <div class="shadow shadow-lg rounded-4 p-4 w-25">
                    <p class="h1 text-center">Total product on our site</p>
                    <br>
                    <p class="h1 text-center text-primary">{{ $products }}</p>
                </div>
                <div class="shadow shadow-lg rounded-4 p-4 w-25">
                    <p class="h1 text-center">Total product ordered</p>
                    <br>
                    <p class="h1 text-center text-primary">{{ $totalOrdered }}</p>
                </div>
                <div class="shadow shadow-lg rounded-4 p-4 w-25">
                    <p class="h1 text-center">Total user registered</p>
                    <br>
                    <p class="h1 text-center text-primary">{{ $users }}</p>
                </div>
            </div>
            <div class="d-flex" style="height:100px;"></div>
            <div class="mx-auto text-center">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Discover our products</a>
            </div>
        </div>
    </div>

@endsection
