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
                    <h5>Jumlah Mobil : {{ $jumlahMobil }}</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="data-mobil/simpan">
                                        @csrf

                                        <div class="form-group">
                                            <label for="id_kondisi">Kondisi</label><br>
                                            <select name="id_kondisi" id="id_kondisi"
                                                class="form-select form-control border">
                                                @foreach ($kondisi as $item)
                                                    <option value="" disabled hidden selected>Pilih Kondisi Mobil
                                                    </option>
                                                    <option value="{{ $item->id_kondisi }}">
                                                        ID: {{ $item->id_kondisi }} KONDISI: {{ $item->deskripsi }}
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="merek">Nama Merk</label><br>
                                            <input type="text" class="form-control border" name="merek" id="merek"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>

                                        <div class="form-group">
                                            <label for="biaya">Biaya</label><br>
                                            <input type="text" class="form-control border" name="biaya" id="biaya"
                                                autocomplete="off" required="required" placeholder="ketik" value="Rp. ">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered DataTable border" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kondisi</th>
                                                <th>Merk</th>
                                                <th>Biaya</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mobil as $data)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $data->deskripsi }}</td>
                                                    <td>{{ $data->merek }}</td>
                                                    <td>{{ $data->biaya }}</td>
                                                    <td>
                                                        <a href="data-mobil/edit/{{ $data->id_mobil }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-pen"></i>
                                                            Ubah</a>
                                                        <a href="data-mobil/detail/{{ $data->id_mobil }}"
                                                            class="btn btn-sm btn-primary text-white"><i
                                                                class="fa-solid fa-circle-info "></i>Detail</a>
                                                        <a href="data-mobil/hapus" class="btn btn-sm btn-danger btnHapus"
                                                            idMobil="{{ $data->id_mobil }}">
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
                let idMobil = $(this).closest('.btnHapus').attr('idMobil');
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
                            url: 'data-mobil/hapus',
                            data: {
                                id_mobil: idMobil,
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
