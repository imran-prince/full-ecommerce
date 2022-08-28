<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('Admin.css')
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('Admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('Admin.topbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <table class="table text-white">
                        <div class="w-50 m-auto  ">
                            <h1 class="text-white">Search</h1>
                            <form action="{{route('admin.search')}}" method="post">
                                @csrf

                                <div class="my-11">
                                    <input type="text" name="search" placeholder="search by name, title">
                                    <input type="submit" class="btn btn-sm btn-primary " value="search Data">
                                </div>
                            </form>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Product_title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment_status</th>
                                <th scope="col">Delivery_status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Delivered</th>
                                <th scope="col">Print Pdf</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order as $item => $order)
                                <tr>
                                    <th scope="row">{{ ++$item }}</th>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td><img src="product/{{ $order->image }}" width="70px" height="70px"
                                            alt=""></td>
                                    @if ($order->delivery_status == 'processing')
                                        <td>
                                            <a href="{{ route('admin.delivery', $order->id) }}"
                                                class="btn btn-sm btn-primary "
                                                onclick="return confirm('Are you sure to delivered')">Delivered</a>
                                        </td>
                                    @else
                                        <td class="text-danger">Delivered</td>
                                    @endif
                                    @if ($order->payment_status == 'paid')
                                        <td>
                                            <a href="{{ route('print.pdf', $order->id) }}"
                                                class="btn btn-sm btn-danger">Invoice</a>
                                        </td>
                                    @endif

                                </tr>
                                @empty  
                                <tr>
                                    <td colspan="17" class="text-center">No data Found</td>
                                </tr>
                                    
                                
                            @endforelse


                        </tbody>
                    </table>





                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('Admin.script')
    <!-- End custom js for this page -->
</body>

</html>
