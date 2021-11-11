@extends('admin.auth.layout.template')
@section('title', $title)
@section('admin-auth-content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Login</h1>
                    <form class="form-login">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault" name="remember_me">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat saya?
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
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
                        if (res.status == 'success') {
                            Swal.fire({
                                icon: "success",
                                title: "Login berhasil!",
                                confirmButtonColor: '#1266F1',
                            }).then(function() {
                                window.location.replace("{{ route('admin.dashboard') }}");
                            })
                        } else if (res.status == 'fail') {
                            Toastify({
                                text: "Akun invalid!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#D12E2E",
                            }).showToast();
                        }
                    },
                    error: function(res) {
                        $.each(res.responseJSON.errors, function(id, error) {
                            Toastify({
                                text: error,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#D12E2E",
                            }).showToast();
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
