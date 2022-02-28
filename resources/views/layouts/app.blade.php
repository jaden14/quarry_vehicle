<!doctype html>
<html lang="en">
<head>
  <title>Portal</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- App CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>
<body>
    <div id="app">
         <header class="app-header fixed-top">
            @include('layouts.components.navbar')
            @include('layouts.components.sidebar')
        </header>

        <main class="py-4">
            @yield('content')
        </main>

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4" >
            @include('layouts.components.footer')
            <!--//container-fluid-->
        </div>
        <footer></footer>
    </div>
    </div>
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>  

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script> 
    <script src="{{ asset('assets/js/index-charts.js') }}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script> 

</body>
</html>
