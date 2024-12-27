<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Master Layout')</title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https:fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap) " rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    {{-- tailwind css --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    <div class="position-relative bg-white d-flex p-0">
        @include('ui.sidebar')

        <div class="content">
            @include('ui.navbar')
            @yield('content')
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src={{ asset('lib/chart/chart.min.js')}}></script>
    <script src={{ asset("lib/easing/easing.min.js") }}></script>
    <script src={{ asset("lib/waypoints/waypoints.min.js") }}></script>
    <script src={{ asset("lib/owlcarousel/owl.carousel.min.js") }}></script>
    <script src={{ asset("lib/tempusdominus/js/moment.min.js") }}></script>
    <script src={{ asset("lib/tempusdominus/js/moment-timezone.min.js") }}></script>
    <script src={{ asset("lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js") }}></script>


    <script src={{ asset("https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js" )}}></script>
 <!-- Template Javascript -->
    <script src={{ asset("js/main.js") }}></script>
    @stack('js')
</body>
</html>