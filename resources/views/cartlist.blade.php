@extends('master')
@section('content')
    <div class="container" style="padding-top: 20px">
        
        <h2 class="text-center" style="padding-bottom: 20px">Shopping cart</h2>
        <div class="row">
            <div class="col-6 text-start">
                <a href="/ordernow" class="btn btn-success">Order Now</a>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-sm btn-danger" href="/cartremoveall">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> All
                </a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Photo</td>
                    <td>Product</td>
                    <td>Pricing</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($productsCart as $index => $item)
                    <tr style="cursor: pointer">
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">
                            <img class="cart_img" src="{{ $item->gallery }}">
                        </td>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="align-middle">{{ $item->price }}</td>
                        <td class="align-middle">
                            <div class="row">
                                <div class="col-12  d-flex justify-content-center">
                                    <a class="btn btn-sm btn-danger" href="/cartremove/{{$item->cart_id}}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="align-midlle">
                            {{$total}}
                        </td>
                        <td></td>
                    </tr>
                
              

            </tbody>
        </table>

    </div>
@endsection
<style>
    .cart_img {
        width: auto;
        height: 80px;
    }

</style>
