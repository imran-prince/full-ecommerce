<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
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
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close " data-bs-dismiss="alert" style="float: right"
                            aria-label="Close">X</button>

                    </div>
                @endif

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <p class="card-description text-center text-lg text-primary font-bold size"> Product
                                    Upload </p>
                                <form class="forms-sample" action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Product Title</label>
                                        <input type="text" class="form-control" name="title" id="exampleInputName1"
                                            placeholder="title" value="{{$product->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Product Description</label>
                                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" value="{{$product->description}}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Product Price</label>
                                        <input type="number" name="price" value="{{$product->price}}" class="form-control"
                                            id="exampleInputPassword4" placeholder="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Product Discount_Price</label>
                                        <input type="number" value="{{$product->discount_price}}"name="discount_price" class="form-control"
                                            id="exampleInputPassword4" placeholder="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Product Quantity</label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}"  min="0" class="form-control"
                                            id="exampleInputPassword4" placeholder="quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Product Category</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="{{$product->category}}" selected>{{$product->category}}</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Current   Image</label>
                                         <img src="product/{{$product->image}}" alt="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Update Image</label>
                                        <input type="file" name="image" min="0" class="form-control"
                                            id="exampleInputPassword4" placeholder="quantity">
                                    </div>

                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
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
