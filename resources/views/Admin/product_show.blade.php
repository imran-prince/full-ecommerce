<!DOCTYPE html>
<html lang="en">

<head>
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




                    <table class="table  text-white"  >
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Sl</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Discount_price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item=>$data)
                            <tr>
                                <th scope="row">{{++$item}}</th>
                                <td>{{$data->title}}</td>
                                <td>{{$data->description}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{$data->discount_price}}</td>
                                <td><img src="product/{{$data->image}}" alt=""></td>
                                <td>{{$data->category}}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                              
                            </tr>
                                
                            @endforeach
                           
                            
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
