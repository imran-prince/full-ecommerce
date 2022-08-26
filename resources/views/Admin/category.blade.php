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
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close " data-bs-dismiss="alert" style="float: right"
                                aria-label="Close">X</button>

                        </div>
                    @endif
                    <div class="w-50 m-auto mt-20">
                        <form action="{{ url('category_store') }}" method="POST">
                            @csrf
                            <div class="mb-3" class="cotainer-fluid">
                                <label for="exampleInputEmail1" class="form-label text-indigo-400">Category</label>
                                <input type="text" name="category_name" class="form-control w-50 text-secondary"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>

                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>


                        <table class="table mt-20">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col"> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $key => $data)
                                    <tr class="text-white">
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $data->category_name }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to delet this')" href="{{route('category.delete',$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="" class="btn btn-info btn-sm">Edit</a>
                                    
                                        

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
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
