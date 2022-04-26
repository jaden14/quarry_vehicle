<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quarry and Vehicle Violation System</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Quarry and Vehicle Violsation System">
    <meta name="author" content="Gian Carlo Marquez">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
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
    <!-- Javascript -->
    <!--{{ asset('assets/plugins/popper.min.js') }}-->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>

    <!-- Charts JS -->
    {{--  <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>  --}}

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--Auto Focus-->
    @yield('scripts')

    <script>
    $('#createViolation').on('shown.bs.modal', function() {
        $(this).find('#VehicleViolationType').focus();
    });
    </script>

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- AJAX Setup -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Toastify -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
  </body>
</html>
