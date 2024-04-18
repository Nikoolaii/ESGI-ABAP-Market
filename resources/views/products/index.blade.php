@extends('base')

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products</title>
    </head>

    <body>
        <div class="container-fluid ">
            <div class="row h-100 text-dark ">
                <!-- Colonne pour les filtres -->
                <div class="card shadow-lg col-xl-4 col-sm border pt-5">
                    <div class="col-xl-10 col-sm mx-auto">
                        <h1>Filters <i class="fas fa-filter fa-fw"></i></h1>
                        <div class="d-flex" style="height: 20px;"></div>
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" id="search" placeholder="Rechercher un article"
                                aria-label="SearchBar" aria-describedby="button-search" />
                            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                                <i class="fas fa-magnifying-glass"></i>
                            </button>
                        </div>
                        <div class="d-flex" style="height: 20px;"></div>
                        <p class='h4'>Categories</p>
                        <hr class="w-100" />

                        <div class="btn-group dropdown w-100">
                            <select class="form-select" name="type" required>
                                <option value="All">All categories</option>
                                {{-- <option value="Digital">Digital</option>
                    <option value="Immobilier">Immobilier</option>
                    <option value="Mode">Mode</option> --}}
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Colonne pour les articles -->
                <div class="col-xl-8 col-sm text-center border pt-5">
                    <div class="col-xl-10 mx-auto">
                        <h1>Products</h1>
                        <div class="d-flex" style="height: 50px;"></div>
                        <div class="row d-flex flex-wrap" id="productsContainer">
                            @foreach ($products as $product)
                                <div class="col-xl-4 mb-5 product-card" data-category="">
                                    <div class='card shadow-lg col-xl-12 col-sm-6 border pt-3 mx-auto'
                                        style="height:450px;">
                                        <div style="height: 200px;" class="d-flex align-items-center justify-content-center">
                                            <img src="{{ $product->image }}" alt="product image" class='img-fluid mx-auto h-75 d-inline-block'>
                                        </div>
                                        <div class='card-body'>
                                            <h5 class='card-title pb-1'><b>{{ $product->name }}</b></h5>
                                            <p class='card-text h5 pb-2'>Price {{ $product->price }} €</p>
                                            <form action="{{ route('products.show', $product->id) }}" method="post">
                                                <input class="d-none" type="text" name="id_product" value="" />
                                                <button type="submit" class='btn btn-primary btn-lg'>See more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 "> {{ $products->links('vendors.pagination.custom') }}</div>
            </div>
        </div>
    </body>

    </html>
@endsection