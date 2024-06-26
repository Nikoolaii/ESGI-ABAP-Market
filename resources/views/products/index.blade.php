@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="row h-100 text-dark ">
            <!-- Colonne pour les filtres -->
            <div class="card shadow-lg col-xl-4 col-sm border pt-5">
                <div class="col-xl-10 col-sm mx-auto">
                    <h1>Filters <i class="fas fa-filter fa-fw"></i></h1>
                    <div class="d-flex" style="height: 20px;"></div>
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" id="search" placeholder="Search a product"
                               aria-label="SearchBar" aria-describedby="button-search"/>
                    </div>
                    <div class="d-flex" style="height: 20px;"></div>
                    <p class='h4'>Categories</p>
                    <hr class="w-100"/>

                    <div class="btn-group dropdown w-100">
                        <select class="form-select" name="type" required>
                            <option value="All">All categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Prix -->
                    <div class="d-flex" style="height: 60px;"></div>
                    <p class='h4'>Prix</p>
                    <hr class="w-100"/>
                    <div class="d-flex" style="height: 20px;"></div>
                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-3 me-2">
                            <input type="text" class="form-control" placeholder="Prix min" id="minPrice"
                                   aria-label="Prix min" aria-describedby="button-addon2"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2">€</span>
                        </div>
                        <div class="input-group mb-3 ms-2">
                            <input type="text" class="form-control" placeholder="Prix max" id="maxPrice"
                                   aria-label="Prix max" aria-describedby="button-addon2"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2">€</span>
                        </div>
                    </div>
                    <!-- More -->
                    <div class="d-flex" style="height: 60px;"></div>
                    <p class='h4'>More</p>
                    <hr class="w-100"/>
                    <div class="d-flex" style="height: 20px;"></div>
                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-3 ms-2">
                            {{-- list of filters like popularity, price asc or desc --}}
                            <div class="btn-group dropdown w-100 btn-secondary">
                                <select id="sortDropdown" class="form-select" name="sortDropdown">
                                    <option value="popularity">Popularity</option>
                                    <option value="priceLowToHigh">Price: Low to High</option>
                                    <option value="priceHighToLow">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Colonne pour les articles -->
            <div class="col-xl-8 col-sm text-center border p-0">
                <div class="col-xl-12">
                    @if (isset($discount))
                        <h3 class="text-center text-dark mb-0 py-2 shadow rounded" style="background-color: #FFF;">
                            Purchase with the code
                            {{ $discount->code }} and
                            obtain a discount of {{ $discount->value }} %</h3>
                    @endif
                </div>
                <div class="col-xl-10 mx-auto  pt-5">
                    <h1>Products</h1>
                    <div class="d-flex" style="height: 50px;"></div>
                    <div class="row d-flex flex-wrap" id="productsContainer">
                        @foreach ($products as $product)
                            <div class="col-xl-4 mb-5 product-card" data-category="{{ $product->categorie_id }}"
                                 data-popularity="{{ $product->total_orders }}">
                                <div class='card shadow-lg col-xl-12 col-sm-6 border pt-3 mx-auto'
                                     style="height:450px;">
                                    <div style="height: 200px;"
                                         class="d-flex align-items-center justify-content-center">
                                        <img src="{{ $product->image }}" alt="product image"
                                             class='img-fluid mx-auto h-75 d-inline-block'>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title pb-1'><b>{{ $product->name }}</b></h5>
                                        <p class='card-text h5 pb-2'>Price {{ $product->price }} €</p>
                                        <form action="{{ route('products.show', $product->id) }}" method="get">
                                            @csrf
                                            <input class="d-none" type="text" name="id_product"/>
                                            <button type="submit" class='btn btn-primary btn-lg'>See more</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div
                    class="d-flex justify-content-center mt-5 "> {{ $products->links('vendors.pagination.custom') }}</div>
            </div>
        </div>
    </div>

@endsection
