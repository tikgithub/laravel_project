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
                    <div class="col-6 d-flex justify-content-end ">
                        <form action="/add_to_cart" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button href="" class="btn btn-warning">Add to Cart</button>
                        </form>

                    </div>
                    <div class="col-6 d-flex justify-content-start "> 
                        <form>
                            <button href="" class="btn btn-success">Buy Now</button>
                        </form>
                        
                    </div>
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
