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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="hero_area">
        @include('sweetalert::alert')
        <!-- header section strats -->
        @include('User.header')
        <!-- end header section -->
        <!-- slider section -->
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="btn-close " data-bs-dismiss="alert" style="float: right"
                    aria-label="Close">X</button>

            </div>
        @endif
        <div class="w-75 m-auto  ">
            <?php $totalprice = 0; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Product Title </th>
                        <th scope="col">Product Quantity </th>
                        <th scope="col">Price </th>
                        <th scope="col">Image </th>

                        <th scope="col">Action </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $data)
                        <tr>
                            <th scope="row">{{ ++$item }}</th>
                            <td>{{ $data->product_title }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->price }}</td>
                            <td> <img src="product/{{ $data->image }}" width="70px" height="50px" alt="">
                            </td>
                            <td>
                                <a href="{{ route('remove.cart', $data->id) }}"
                                   onclick="confirmation(event)"
                                    class="btn btn-sm btn-danger  ">Remove product</a>
                            </td>

                        </tr>
                        <?php $totalprice = $totalprice + $data->price; ?>
                    @endforeach


                </tbody>
            </table>

            @if ($totalprice)
                <h2 class="text-center">Total Price : {{ $totalprice }}</h2>
                <div>
                    <h3>Proced to Order</h3>
                    <a href="{{ route('cash.payment') }}" class="btn btn-sm btn-info">Cash on Delivary</a>
                    <a href="{{ route('stripe.payment', $totalprice) }}" class="btn btn-sm btn-primary">Pay Using
                        card</a>
                </div>
            @endif



        </div>
    </div>



    @include('User.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script  >
         function confirmation (event) {
            event.preventDefault();
            const urlToRedirect =  event.currentTarget.getAttribute('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons:true,
                dangerMode:true;
            }).then(willCancel) {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            };
        };
    </script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
</body>

</html>
