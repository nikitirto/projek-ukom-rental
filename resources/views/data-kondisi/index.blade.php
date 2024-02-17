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
                    <h5>Jumlah Kondisi : {{ $jumlahKondisi }}</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow" id="addCard">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="data-kondisi/simpan">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_servis">ID Servis</label>
                                            <select name="id_servis" id="id_servis" class="form-select form-control border">
                                                @foreach ($servis as $item)
                                                    <option value="" disabled hidden selected>Pilih Servis Mobil
                                                    </option>
                                                    <option value="{{ $item->id_servis }}">
                                                        ID: {{ $item->id_servis }} SERVIS: {{ $item->no_parts }}
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <br>
                                            <textarea name="deskripsi" id="deskripsi" cols="23" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fa fa-plus"></i> Tambah</button>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kondisi</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered DataTable border" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Servis</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kondisi as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->id_servis }}</td>
                                                    <td>{{ $data->deskripsi }}</td>
                                                    <td>
                                                        <a href="data-kondisi/edit/{{ $data->id_kondisi }}"
                                                            class="btn btn-sm btn-info" id="editButton"><i
                                                                class="fa fa-pen"></i> Ubah</a>
                                                        <a href="data-kondisi/detail/{{ $data->id_kondisi }}"
                                                            class="btn btn-sm btn-primary text-white"><i
                                                                class="fa-solid fa-circle-info "></i>Detail</a>
                                                        <a href="data-kondisi/hapus" class="btn btn-sm btn-danger btnHapus"
                                                            idKondisi="{{ $data->id_kondisi }}">
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
                let idKondisi = $(this).closest('.btnHapus').attr('idKondisi');
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
                            url: 'data-kondisi/hapus',
                            data: {
                                id_kondisi: idKondisi,
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
