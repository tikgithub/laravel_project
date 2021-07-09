@extends('master')
@section('content')
   
    <div class="trending-wraper text-center">
        <h3>Trending Product</h3>
        @foreach ($search_data as $item)

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
