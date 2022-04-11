<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Quarry and Vehicle Violation System</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Quarry and Vehicle Violsation System">
    <meta name="author" content="Gian Carlo Marquez">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head> 
    
    

</head>
<body class="app" cz-shortcut-listen="true">

@include('sweetalert::alert')

    <div id="app">
        <header class="app-header fixed-top">
            @include('layouts.components.navbar')
            @include('layouts.components.sidebar')
        </header>

        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4" >
                @yield('content')
                <!--//container-fluid-->
            </div>
            @include('layouts.components.footer')
        </div>
    </div>
    @yield('scripts')
    <!-- Javascript -->   
    <!--{{ asset('assets/plugins/popper.min.js') }}-->     
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script> 

    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!--Auto Focus-->
    <script>
    $('#createConveyance').on('shown.bs.modal', function() {
        $(this).find('#conveyanceText').focus();
    });

    $('#createViolation').on('shown.bs.modal', function() {
        $(this).find('#VehicleViolationType').focus();
    });
    </script>

  </body>
</html>
