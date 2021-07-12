@extends('master')
@section('content')
    <div class="container p-5">
        <h3 class="text-center">User Registeration</h3>
        <hr>
        <div class="row">
            <div class="col-4 offset-4">
                <form action="/register" method="post" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="">
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
