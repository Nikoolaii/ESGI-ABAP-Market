@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row justify-content-center">
            <h2 class="text-center py-5">Welcome to our shop !</h2>
            {{-- Carousel --}}
            <div class="col-xl-12 pt-0 pb-5 mx-auto bg-dark">
                <h1 class="text-center">Our products</h1>
                <div id="carouselExample" class="carousel slide text-center">
                    <div class="carousel-inner">
                        @foreach ($bestSeller as $key => $product)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <a href="{{ route('products.show', $product->id) }}"><img src="{{ $product->image }}"
                                                                                          alt="RIEN A VOIR"
                                                                                          class='img-fluid mx-auto h-25 d-inline-block rounded rounded-5'
                                                                                          style="height: 100px;"></a>
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
            <h2 class="text-center py-5">Statistics</h2>
            <div class="row col-sm d-flex justify-content-around mt-5">
                <div class="col-xl-3 col-sm-8 shadow shadow-lg rounded-4 p-4">
                    <p class="h1 text-center">Total product on our site</p>
                    <br>
                    <p class="h1 text-center text-primary">{{ $products }}</p>
                </div>
                <div class="col-xl-3 col-sm-8 shadow shadow-lg rounded-4 p-4">
                    <p class="h1 text-center">Total product ordered</p>
                    <br>
                    <p class="h1 text-center text-primary">{{ $totalOrdered }}</p>
                </div>
                <div class="col-xl-3 col-sm-8 shadow shadow-lg rounded-4 p-4">
                    <p class="h1 text-center">Total user registered</p>
                    <br>
                    <p class="h1 text-center text-primary">{{ $users }}</p>
                </div>
            </div>
            <h2 class="text-center py-5">Random products</h2>
            <div class="row col-sml d-flex justify-content-around mt-5">
                @foreach($randomProducts as $product)
                    <div class="col-xl-3 col-sm-8 shadow shadow-lg rounded-4 p-4">
                        <div class="text-center">
                            <img src="{{ $product->image }}" alt="RIEN A VOIR"
                                 class='img-fluid mx-auto d-inline-block rounded rounded-5'
                                 style="height: 100px;">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <p>{{ $product->price }} €</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex" style="height:100px;"></div>
            <div class="mx-auto text-center pb-5">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Discover our products</a>
            </div>
        </div>
    </div>
@endsection
