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
      <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="{{asset('frontend')}}/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('frontend')}}/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
            @include('User.header')
         <!-- end header section -->
         <!-- slider section -->
           @include('User.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('User.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('User.arivial')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('User.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('User.subscrive')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('User.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('User.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href=" ">By Prince</a><br>
         
            
         
         </p>
      </div>
      <!-- jQery -->
      <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="{{asset('frontend')}}/js/custom.js"></script>
   </body>
</html>