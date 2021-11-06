<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    @yield('admin-auth-content')

    <!-- js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/mazer/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('plugins/mazer/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
