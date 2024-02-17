@extends('include.layout')

@section('content')
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="z-3 p-3">
                    @include('include.flash-message')
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h1 class="h3 mb-4 text-gray-800"></h1>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <h5>Jumlah Customer : {{ $jumlahCustomer }}</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="data-customer/simpan" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_user">ID User</label><br>
                                            <select name="id_user" id="id_user" class="form-select form-control border">
                                                @foreach ($user as $item)
                                                    <option value="" disabled hidden selected>Pilih ID User
                                                    </option>
                                                    <option value="{{ $item->id_user }}">
                                                        ID: {{ $item->id_user }}
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat_rumah">Alamat Rumah</label><br>
                                            <textarea name="alamat_rumah" id="alamat_rumah" cols="23" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto_ktp">Foto KTP</label><br>
                                            <input type="file" class="form-control border" name="foto_ktp" id="foto_ktp"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label><br>
                                            <input type="text" class="form-control border" name="nama_lengkap"
                                                id="nama_lengkap" autocomplete="off" required="required"
                                                placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="kode_pos">Kode POS</label><br>
                                            <input type="number" class="form-control border" name="kode_pos" id="kode_pos"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp">No Telp</label><br>
                                            <input type="number" class="form-control border" name="no_telp" id="no_telp"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <button type="reset" class="btn btn-sm btn-danger"><i
                                                                class="fa fa-times"></i> Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Customer</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-bordered DataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID User</th>
                                                <th>Alamat Rumah</th>
                                                <th>Nama Lengkap</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customer as $data)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $data->id_user }}</td>
                                                    <td>{{ $data->alamat_rumah }}</td>
                                                    <td>{{ $data->nama_lengkap }}</td>
                                                    <td>
                                                        <a href="data-customer/edit/{{ $data->id_customer }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-pen"></i>
                                                            Ubah</a>
                                                        <a href="data-customer/detail/{{ $data->id_customer }}"
                                                            class="btn btn-sm btn-primary text-white"><i
                                                                class="fa-solid fa-circle-info "></i>Detail</a>
                                                        <a href="data-customer/hapus" class="btn btn-sm btn-danger btnHapus"
                                                            idCustomer="{{ $data->id_customer }}">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="module">
            $('tbody').on('click', '.btnHapus', function(a) {
                a.preventDefault();
                let idCustomer = $(this).closest('.btnHapus').attr('idCustomer');
                swal.fire({
                    title: "Apakah anda ingin menghapus data ini?",
                    showCancelButton: true,
                    confirmButtonText: 'Setuju',
                    cancelButtonText: `Batal`,
                    confirmButtonColor: 'red'

                }).then((result) => {
                    if (result.isConfirmed) {
                        //Ajax Delete
                        $.ajax({
                            type: 'DELETE',
                            url: 'data-customer/hapus',
                            data: {
                                id_customer: idCustomer,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                if (data.success) {
                                    swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                        //Refresh Halaman
                                        location.reload();
                                    });
                                }
                            }
                        });
                    }
                });
            });

            $(document).ready(function() {
                $('.DataTable').DataTable();
            });
        </script>
    @endsection
