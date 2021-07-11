<?php
use App\Http\Controllers\ProductController;
$total_cart = 0;
if (Session::has('user')) {
$total_cart = ProductController::getCartItem();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                </li>

            </ul>

            <ul class="navbar-nav  ">
                <li class="nav-item">
                    <form class="d-flex" style="width: 500px" action="/search" method="GET">
                        <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cartlist" tabindex="-1" aria-disabled="true">Cart({{ $total_cart }})</a>
                </li>
                @if (Session::has('user'))
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{Session::get('user')->email}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
