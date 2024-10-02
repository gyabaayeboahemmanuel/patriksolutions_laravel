<!DOCTYPE html>
<html lang="en">
<head>

     <title>@yield('title')</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="shortcut icon" href="{{asset('assets/logos/patrick_logo.png')}}" type="image/x-icon">
     <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset ('assets/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{ asset ('assets/css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{ asset ('assets/css/owl.theme.default.min.css')}}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
     <!-- CK editor-->
     <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
     <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/42.0.0/ckeditor5-premium-features.css" />
     <script type="importmap">
       {
           "imports": {
               "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
               "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/",
               "ckeditor5-premium-features": "https://cdn.ckeditor.com/ckeditor5-premium-features/42.0.0/ckeditor5-premium-features.js",
               "ckeditor5-premium-features/": "https://cdn.ckeditor.com/ckeditor5-premium-features/42.0.0/"
           }
       }
   </script>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>
     <!-- MENU -->
@include('blog.components.menu')

{{-- CONTENT --}}
@yield('content')

     <!-- FOOTER -->
   @include('blog.components.footer')
     <!-- SCRIPTS -->
     <script src="{{asset ('assets/js/jquery.js')}}"></script>
     <script src="{{asset ('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset ('assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset ('assets/js/smoothscroll.js')}}"></script>
     <script src="{{asset ('assets/js/custom.js')}}"></script>
     <script type="module" src="{{ asset('assets/vendor/ckeditor.js') }}"></script>
</body>
</html>