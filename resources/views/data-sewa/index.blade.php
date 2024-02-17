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
                    <h5>Jumlah Sewa : {{ $jumlahSewa }}</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="data-sewa/simpan">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_customer">Customer</label><br>
                                            <select name="id_customer" id="id_customer"
                                                class="form-select form-control border">
                                                @foreach ($customer as $item)
                                                    <option value="" disabled hidden selected>Pilih Customer
                                                    </option>
                                                    <option value="{{ $item->id_customer }}">
                                                        ID: {{ $item->id_user }} NAMA: {{ $item->nama_lengkap }}
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_mobil">Mobil</label><br>
                                            <select name="id_mobil" id="id_mobil" class="form-select form-control border">
                                                @foreach ($mobil as $item)
                                                    <option value="" disabled hidden selected>Pilih Mobil
                                                    </option>
                                                    <option value="{{ $item->id_mobil }}">
                                                        ID: {{ $item->id_mobil }} MEREK: {{ $item->merek }} BIAYA:
                                                        {{ $item->biaya }}
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_rek">Rekening</label><br>
                                            <select name="id_rek" id="id_rek" class="form-select form-control border">
                                                @foreach ($rekening as $item)
                                                    <option value="" disabled hidden selected>Pilih Rekening
                                                    </option>
                                                    <option value="{{ $item->id_rek }}">
                                                        ID: {{ $item->id_rek }} BANK: {{ $item->nama_bank }} REK:
                                                        {{ $item->no_rek }}
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_sewa">Tanggal Sewa</label><br>
                                            <input type="date" class="form-control border" name="tgl_sewa" id="tgl_sewa"
                                                autocomplete="off" required="required" placeholder="ketik">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_kembali">Tanggal Kembali</label><br>
                                            <input type="date" class="form-control border" name="tgl_kembali"
                                                id="tgl_kembali" autocomplete="off" required="required" placeholder="ketik">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_transaksi">Tanggal Transaksi</label><br>
                                            <input type="date" class="form-control border" name="tgl_transaksi"
                                                id="tgl_transaksi" autocomplete="off" required="required"
                                                placeholder="ketik">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Sewa</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered DataTable border" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Customer</th>
                                                <th>Mobil</th>
                                                <th>Rekening</th>
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sewa as $data)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $data->nama_lengkap }}</td>
                                                    <td>{{ $data->merek }}</td>
                                                    <td>{{ $data->no_rek }}</td>
                                                    <td>{{ $data->tgl_sewa }}</td>
                                                    <td>{{ $data->tgl_transaksi }}</td>
                                                    <td>
                                                        <a href="data-sewa/edit/{{ $data->id_sewa }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-pen"></i>
                                                            Ubah</a>
                                                        <a href="data-sewa/detail/{{ $data->id_sewa }}"
                                                            class="btn btn-sm btn-primary text-white"><i
                                                                class="fa-solid fa-circle-info "></i>Detail</a>
                                                        <a href="data-sewa/hapus" class="btn btn-sm btn-danger btnHapus"
                                                            idSewa="{{ $data->id_sewa }}">
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
                let idSewa = $(this).closest('.btnHapus').attr('idSewa');
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
                            url: 'data-sewa/hapus',
                            data: {
                                id_sewa: idSewa,
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
