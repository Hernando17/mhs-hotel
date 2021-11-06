<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('plugins/mazer/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mazer/vendors/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    <div id="app">
        @include('admin.layout.sidebar')

        <div id="main">
            <header class="mb-3">
                <a role="button" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
            </header>

            @yield('admin-content')
        </div>

        @include('admin.layout.footer')
    </div>

    <!-- js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/mazer/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins/mazer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/mazer/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('plugins/mazer/js/main.js') }}"></script>
    <script src="{{ asset('plugins/mazer/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript">
        $('.btn-logout').on('click', function() {
            Swal.fire({
                icon: 'question',
                title: 'Yakin untuk keluar?',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#1266F1',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace("{{ route('admin.logout') }}");
                }
            })
        });
    </script>
</body>

</html>
