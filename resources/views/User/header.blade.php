<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="frontend/images/logo.png"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all.product')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Blog</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.show')}}">cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('order.show')}}">Order</a>
                    </li>


                   
                    @if (Route::has('login'))
                        @auth
                            <x-app-layout>

                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }} ">login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('register') }}">register</a>
                            </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
