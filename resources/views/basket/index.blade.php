@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white p-4 shadow-lg rounded-3">
            <h1 class="text-center">Cart</h1>
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
            <hr/>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @forelse($basket as $item)
                    <tr>
                        <td class="align-middle">
                            <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}"
                                 style="width: 70%"/>
                        </td>
                        <td class="align-middle">
                            <h3>{{ $item['product']->name }}</h3>
                            <p>{{ $item['product']->description }}</p>
                        </td>
                        <td class="align-middle" style="width: 10%">
                            <h3>{{$item['price']}} $</h3>
                            <p>{{ $item['product']->price }} $</p>
                        </td>
                        <td class="align-middle">
                            <form action="{{ route('basket.update', $item['id']) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                       class="form-control" style="width: 100px;" onfocusout="this.form.submit()">
                            </form>
                        </td>
                        <td class="align-middle">
                            <form action="{{ route('basket.destroy', $item['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Cart is empty</h3>
                        </td>
                    </tr>
                @endforelse
            </table>
            <hr/>
            <div class="d-flex justify-content-between">
                <form action="{{ route('basket.promo') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="promo" class="form-control" placeholder="Promo code">
                        <button class="btn btn-outline-secondary" type="submit">Apply</button>
                    </div>
                </form>

            </div>
            @if(session('promo'))
                <div>
                    <h3>Promo code: {{ session('promo')['code'] }}
                        <form action="{{ route('basket.promo') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </h3>
                    <p>Discount: {{ session('promo')['discount'] }}%</p>
                    <p>Price after discount: {{ session('promo')['priceAfterDiscount'] }} $</p>
                    <p>Price before discount: {{session('total')}} $</p>
                </div>
            @endif
            <hr/>
            <div class="d-flex justify-content-between">
                <h3>Total: @if(session('promo'))
                        {{ session('promo')['priceAfterDiscount'] }}
                    @else
                        {{ session('total') }}
                    @endif$</h3>
                <div>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Continue shopping</a>
                </div>
                @if(count($basket) > 0)
                    <div>
                        <a href="{{ route('basket.checkout') }}" class="btn btn-success">Checkout</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
