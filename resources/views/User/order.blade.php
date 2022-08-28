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
        <!-- end header section -->
        <!-- slider section -->
   
                <div class="my-12">
                    <table class="table   ">
                    
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                
                            
                                <th scope="col">Product_title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment_status</th>
                                <th scope="col">Delivery_status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Delivered</th>
                             
    
    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item => $order)
                                <tr>
                                    <th scope="row">{{ ++$item }}</th>
                                   
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td><img src="product/{{ $order->image }}" width="70px" height="70px"
                                            alt=""></td>
                                    @if ($order->delivery_status == 'processing')
                                        <td>
                                            <a href="{{ route('order.cancel', $order->id) }}"
                                                class="btn btn-sm btn-danger "
                                                onclick="return confirm('Are you sure to delivered')">Cancel Order</a>
                                        </td>
                                    @else
                                        <td class="text-danger">Not allow</td>
                                    @endif
                                     
    
                                </tr>
                           
                            @endforeach
    
    
                        </tbody>
                    </table>
                </div>
          

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
