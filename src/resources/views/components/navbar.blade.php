<?php
use Illuminate\Support\Facades\Session;

$cartItems = Session::get('user.cart', []);
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('feedback') }}">Feedback</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item px-2 dropdown">
                    <a 
                        class="nav-link dropdown-toggle" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                    >
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('orders') }}">Orders</a></li>

                        @if (Auth::user()->is_admin)
                        <hr>
                        
                        <li><a class="dropdown-item" href="{{ route('admin.users') }}">User Management</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.menu-items') }}">Menu Items Management</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.orders') }}">Orders Management</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.feedbacks') }}">Feedbacks Management</a></li>
                        @endif
                        
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>
                </li>
                @endauth

                @guest
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                </li>
                @endguest
                
                <li class="nav-item px-2">
                    <a href="{{ route('cart') }}" class="btn btn-light">
                        <i class="bi bi-cart-fill"></i>
                        <span class="badge rounded-pill bg-danger">{{ count($cartItems) > 0 ? count($cartItems) : null }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
