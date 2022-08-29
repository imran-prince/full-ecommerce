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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.css">
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
            <p class="mx-auto">© 2021 All Rights Reserved By <a href=" ">By Prince</a><br>
            </p>
        </div>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
        <!-- popper js -->
        {{-- <script src="js/popper.min.js"></script> --}}
        <!-- bootstrap js -->
        {{-- <script src="js/bootstrap.js"></script> --}}
        <!-- custom js -->
        <script src="{{ asset('frontend') }}/js/custom.js"></script>
        <script>
            function add_to_cart(product_id) {
            $(document).ready(function(e) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var quantity = $('.quantity').val();
                $.ajax({
                    method: 'POST',
                    url: "{{ asset('/') }}add-to-cart",
                    data: {
                        id: product_id,
                        quantity: quantity,
                    },
                    cache: false,
                    success: function(response) {
                        //  window.location.reload();
                        if (response.status === true) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Product added to cart successfully'
                            })
                            $('.total_cart_items').html(response.count);
                            // // $('.test').html('This is for test');
                            // $('.productImage_ajax').attr("src", response.productImage);
                            // $('.productTotalPrice_ajax').html(response.productTotalPrice);
                            // $('.total_price_ajax').html(response.total);
                        }
                    },
                    async: false,
                    error: function(error) {
                    }
                })
            })
        }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>
