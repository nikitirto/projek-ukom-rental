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
                    <h5>Jumlah Servis : {{ $jumlahServis }}</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="data-servis/simpan">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_parts">ID Parts</label><br>
                                            <input type="number" class="form-control border" name="id_parts" id="id_parts"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="no_parts">No Parts</label><br>
                                            <input type="number" class="form-control border" name="no_parts" id="no_parts"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_servis">Tanggal Servis</label><br>
                                            <input type="date" class="form-control border" name="tgl_servis"
                                                id="tgl_servis" autocomplete="off" required="required" placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="no_parts_ganti">No Parts Ganti</label><br>
                                            <input type="number" class="form-control border" name="no_parts_ganti"
                                                id="no_parts_ganti" autocomplete="off" required="required"
                                                placeholder="ketik">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Data Servis</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered DataTable border" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Parts</th>
                                                <th>No Parts</th>
                                                <th>Tanggal Servis</th>
                                                <th>No Parts Ganti</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($servis as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->id_parts }}</td>
                                                    <td>{{ $data->no_parts }}</td>
                                                    <td>{{ $data->tgl_servis }}</td>
                                                    <td>{{ $data->no_parts_ganti }}</td>
                                                    <td>
                                                        <a href="data-servis/edit/{{ $data->id_servis }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                                                        <a href="data-servis/detail/{{ $data->id_servis }}"
                                                            class="btn btn-sm btn-primary text-white"><i
                                                                class="fa-solid fa-circle-info "></i>Detail</a>
                                                        <a href="data-servis/hapus" class="btn btn-sm btn-danger btnHapus"
                                                            idServis="{{ $data->id_servis }}">
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
                let idServis = $(this).closest('.btnHapus').attr('idServis');
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
                            url: 'data-servis/hapus',
                            data: {
                                id_servis: idServis,
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
