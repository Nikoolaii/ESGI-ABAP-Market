@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row justify-content-center">
            <img src="{{ asset('img/AbapMarket.png') }}" alt="ABAP Marketing" class="img-fluid">
            <div class="col-xl-12">
                @if (isset($discount))
                    <h1 class="text-center bg-dark text-light pt-2 mb-0">Purchase with the code {{ $discount->code }} and
                        obtain a discount of {{ $discount->value }} %</h1>
                @endif
            </div>
            {{-- Carousel --}}
            <div class="col-xl-12 pt-0 pb-5 mx-auto bg-dark">
                <h1 class="text-center">Our products</h1>
                <div id="carouselExample" class="carousel slide text-center">
                    <div class="carousel-inner">
                        @foreach ($bestSeller as $key => $product)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <a href="{{ route('products.show', $product->id) }}"><img src="{{ $product->image }}" alt="RIEN A VOIR"
                                    class='img-fluid mx-auto h-25 d-inline-block' style="height: 100px;"></a>
                            </div>
                        @endforeach
                    </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
            </div>

            <div class="row d-flex justify-content-around mt-5">
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
            <div class="mx-auto text-center pb-5">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Discover our products</a>
            </div>
        </div>
    </div>
@endsection
