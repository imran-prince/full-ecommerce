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
            @include('Admin.body')
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
