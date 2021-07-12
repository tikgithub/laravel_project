
@extends('master')
@section('content')
    <div class="container">
        <h3>My Orders:</h3>
        @foreach ($orders as $item)
            <div class="row order-item">
                <div class="col-3">
                    <img src="{{ $item->gallery }}" alt="" srcset="" class="order-image">
                </div>
                <div class="col-9">
                    <b>Product Nmae:</b> {{$item->name}} <br>
                    <b>Price:</b> {{$item->price}} <br>
                    <b>Category:</b> {{$item->category}} <br>
                    <b>Address: </b> {{$item->address}}
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
<style>
    .order-image {
        width: auto;
        height: 100px;
    }
    .order-item{
        padding-top: 20px;
        padding-bottom: 20px;
    }

</style>
