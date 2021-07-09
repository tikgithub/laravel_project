@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 ">
                <img class="detail-img " src="{{ $product->gallery }}" alt="" srcset="">
            </div>
            <div class="col-6">
                <a href="/">Back to Home</a>
                <h2>{{ $product->name }}</h2>
                <h3>Price: {{ $product->price }}</h3>
                <h4>Category: {{ $product->category }}</h4>
                <h4>Description: {{ $product->description }}</h4>
                <br><br>
                <div class="row ">
                    <div class="col-6 d-flex justify-content-end "> <a href="" class="btn btn-warning">Add to Cart</a></div>
                    <div class="col-6 d-flex justify-content-start "> <a href="" class="btn btn-success">Buy Now</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .detail-img {
        height: 20em;
    }

</style>
