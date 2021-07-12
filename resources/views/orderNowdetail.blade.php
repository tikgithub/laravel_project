@extends('master')
@section('content')
    <div class="container" style="padding-top: 20px">

        <h2 class="text-center" style="padding-bottom: 20px">Order Now Please select the prefer payment</h2>

        <table class="table table-hover table-bordered">
            <thead>
                <tr style="font-size: 18pt; font-weight: bold; background-color:rgba(18, 142, 199, 0.8)">
                    <td>#</td>
                    <td>Photo</td>
                    <td>Product</td>
                    <td>Pricing</td>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $item)
                    <tr style="cursor: pointer">
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">
                            <img class="cart_img" src="{{ $item->gallery }}">
                        </td>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="align-middle text-end">{{ $item->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="align-midlle text-end" colspan="4">
                        {{ $total }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <h2>Payment Method</h2>
            <form action="/payorder" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <div class="col">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="5" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="onlinePayment" checked
                        value="onlinePayment">
                    <label class="form-check-label" for="onlinePayment">
                        Online Payment
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="creditCardPayment"
                        value="creditCardPayment">
                    <label class="form-check-label" for="creditCardPayment">
                        Credit Card Payment
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="onDeliveryPay"
                        value="onDeliveryPay">
                    <label class="form-check-label" for="onDeliveryPay">
                        On Delivery Pay
                    </label>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success">Process</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
<style>
    .cart_img {
        width: auto;
        height: 80px;
    }

</style>
