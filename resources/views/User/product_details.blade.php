<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>E-commerce</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{ asset('frontend') }}/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('User.header')
        <div class="w-50 m-auto my-32 ">
            <div class="card" style="width: 18rem;">
                <img src="product/{{ $product->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><span class="font-bold">Title</span>:{{ $product->title }}</h5>
                    <h5 class="card-title"><span class="font-bold">price</span>:{{ $product->price }}</h5>
                    @if ($product->discount_price)
                        <h5 class="card-title"><span
                                class="font-bold">discount_price</span>:{{ $product->discount_price }}</h5>
                    @endif
                    <h5 class="card-title"><span class="font-bold">Avilabe Quantity</span>:{{ $product->quantity }}</h5>
                    <h5 class="card-title"><span class="font-bold">Category</span>:{{ $product->category }}</h5>
                    <p class="card-text"> <span class="font-bold">Description</span>:
                        {{ $product->description }}</p>
                    <form action="{{ route('add.cart', $product->id) }}" method="post">
                        @csrf
                        <input type="number" name="quantity" min="1">
                        <input type="submit" value="add to cart">
                    </form>
                </div>
            </div>
        </div>

        <!-- footer start -->
        @include('User.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="{{ asset('frontend') }}/js/custom.js"></script>
</body>

</html>
