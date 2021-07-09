@extends('master')
@section('content')
    <div class="container custom-product">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                @foreach ($products as $item)
                    <div class="carousel-item {{ $item->id == 1 ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{ $item->gallery }}" class="" alt="{{ $item->name }}"
                            style="height: 300px; width: auto">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $item->name }}</h5>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <hr>
    <div class="trending-wraper text-center">
        <h3>Trending Product</h3>
        @foreach ($products as $item)

            <div class="trending-item text-center">
                <a href="detail/{{$item->id}}">
                    <img src="{{ $item->gallery }}" class="" alt="{{ $item->name }}" style="height: 100px; width: auto">
                    <div class="">
                        <h5>{{ $item->name }}</h5>
                    </div>
                </a>
            </div>
        @endforeach

    </div>

@endsection
<style>
    .trending-item {
        float: left;
        width: 20%;
    }

    .trending-wraper {
        margin: 20px;
    }

</style>
