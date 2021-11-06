@extends('admin.auth.layout.template')
@section('title', $title)
@section('admin-auth-content')
    admin login page
    <form class="form-login">
        @csrf
        <input type="text" class="form-control" name="username">
        <input type="password" class="form-control" name="password">
        <button type="submit">Login</button>
    </form>

    @push('scripts')
        <script type="text/javascript">
            $('.form-login').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.login') }}",
                    method: "POST",
                    data: formData,
                    beforeSend: function(e) {},
                    complete: function(e) {},
                    success: function(res) {
                        if(res.status == 'success') {
                            toastr['success']('Login berhasil!');
                            window.location.replace("{{ route('admin.dashboard') }}");
                        } else if(res.status == 'fail') {
                            toastr['error']('Akun invalid!');
                        }
                    },
                    error: function(res) {
                        $.each(res.responseJSON.errors, function(id, error) {
                            toastr['error'](error);
                        });
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        </script>
    @endpush
@endsection