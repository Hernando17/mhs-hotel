@extends('admin.layout.template')
@section('title', $title)
@section('admin-content')
    <div class="page-heading">
        <h3>Admin</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <form class="input-group">
                            <select name="search_by" class="form-select form-select-sm">
                                <option value="name">Nama</option>
                                <option value="username">Username</option>
                                <option value="email">Email</option>
                            </select>
                            <input type="text" class="form-control form-control-sm" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-4" align="right">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-sm btn-primary btn-reload"><i class="fas fa-redo"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/default.png') }}" style="width: 100px;height: 100px;object-fit: cover" class="border">
                                    </td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title white">Tambah Admin</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-tambah">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <div class="col-12 mb-3">
                                    <img src="{{ asset('images/default.png') }}" class="border img-preview" style="object-fit: cover;max-width: 200px;width: 100%;height: 200px">
                                </div>
                                <input class="w-100" type="file" name="photo">
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-block btn-success my-1">Simpan</button>
                                <button type="button" class="btn btn-block btn-secondary my-1" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $('.btn-reload').click(function() {
                window.location.reload();
            });

            $('.form-tambah').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'question',
                    title: 'Yakin untuk menambahkan data?',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    confirmButtonColor: '#1266F1',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = new FormData(this);
                        $.ajax({
                            url: "{{ route('admin.admin.store') }}",
                            method: "POST",
                            data: formData,
                            beforeSend: function(e) {},
                            complete: function(e) {},
                            success: function(res) {
                                Toastify({
                                    text: res.message,
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#44C640",
                                }).showToast();
                                window.location.reload();
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
                    }
                });
            });

            $('input[name="photo"]').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('.img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endpush
@endsection
