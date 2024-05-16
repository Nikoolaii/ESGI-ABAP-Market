@extends('layouts.app')

@section('content')
    <div class="container p-0 mt-5">
        <form id="payementForm" action="{{route('basket.checkout.validate')}}" method="get">
            @csrf
            <div class="card px-4 bg-white">
                <a href="{{route('basket')}}" class="btn btn-primary mt-2 w-25">Back to Basket</a>
                @if(session('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="alert alert-danger mt-2" id="alert" style="display: none">
                    <p class="text-danger" id="error-text">Please fill all fields</p>
                </div>

                <p class="h8 py-3">Payment Details</p>
                <hr/>
                <input name="address" type="text" placeholder="Address" class="form-control mb-3" id="address">
                <input name="city" type="text" placeholder="City" class="form-control mb-3" id="city">
                <input name="country" type="text" placeholder="Country" class="form-control mb-3" id="country">
                <input name="zip" type="text" placeholder="Zip" class="form-control mb-3" id="zip">
                <hr/>
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Person Name</p>
                            <input class="form-control mb-3" type="text" placeholder="Name" id="name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Card Number</p>
                            <input class="form-control mb-3" type="text" placeholder="1234 5678 435678" maxlength="16"
                                   minlength="16" id="cardNumb" name="cardNumb">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input class="form-control mb-3" type="text" placeholder="MM/YYYY" maxlength="7"
                                   name="expiDate" id="expiDate">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input class="form-control mb-3 pt-2 " type="password" placeholder="***" maxlength="3"
                                   minlength="3" name="cvc" id="cvc">
                        </div>
                    </div>
                    <div class="col-12" onclick="testPayment()">
                        <div class=" btn btn-primary mb-3
                    ">
                    <span>Pay @if(session('promo'))
                            {{ session('promo')['priceAfterDiscount'] }}
                        @else
                            {{ session('total') }}
                        @endif$</span>
                            <span class="fas fa-arrow-right"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    function testPayment() {
        let form = document.getElementById('payementForm');

        let name = document.getElementById('name').value;
        let cardNumber = document.getElementById('cardNumb').value;
        let expiry = document.getElementById('expiDate').value;
        let cvv = document.getElementById('cvc').value;
        let address = document.getElementById('address').value;
        let city = document.getElementById('city').value;
        let country = document.getElementById('country').value;
        let zip = document.getElementById('zip').value;

        if (address === '' || city === '' || country === '' || zip === '' || name === '' || cardNumber === '' || expiry === '' || cvv === '') {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('error-text').innerText = 'Please fill all fields';
            return;
        }

        let errorText = document.getElementById('error-text');

        if (name.length === 0 || cardNumber.length === 0 || expiry.length === 0 || cvv.length === 0 || address.length === 0 || city.length === 0 || country.length === 0 || zip.length === 0) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'Please fill all fields';
            return;
        }

        if (cardNumber.length !== 16) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'Card number must be 16 digits';
            return;
        }

        let expiryRegex = /^(0[1-9]|1[0-2])\/[0-9]{4}$/;
        if (!expiryRegex.test(expiry)) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'Expiry must be in MM/YYYY format';
            return;
        }

        let cvvRegex = /^[0-9]{3}$/;
        if (!cvvRegex.test(cvv)) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'CVV must be 3 digits';
            return;
        }

        document.getElementById('alert').style.display = 'none';
        form.submit();
    }
</script>
