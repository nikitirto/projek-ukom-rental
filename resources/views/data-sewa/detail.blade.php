@extends('include.layout')
@section('content')
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container">
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
                    <div class="row">
                        <div class="col-sm-8 mx-auto">

                            <div class="card shadow" id="addCard">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="simpan">
                                        @csrf

                                        <input type="number" name="id_sewa" id="id_sewa" value="{{ $sewa->id_sewa }}"
                                            hidden>

                                        <div class="form-group">
                                            <label for="id_customer">Customer</label><br>
                                            <input type="text" name="" id=""
                                                value="ID: {{ $sewa->id_customer }} NAMA LENGKAP: {{ $sewa->nama_lengkap }}"
                                                class="form-control border">
                                        </div>

                                        <div class="form-group">
                                            <label for="id_mobil">Mobil</label><br>
                                            <input type="text"
                                                value="ID: {{ $sewa->id_mobil }} MEREK: {{ $sewa->merek }}"
                                                class="form-control border">
                                        </div>

                                        <div class="form-group">
                                            <label for="id_rek">Rekening</label><br>
                                            <input type="text"
                                                value="ID: {{ $sewa->id_rek }} NAMA BANK: {{ $sewa->nama_bank }}"
                                                class="form-control border">
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_sewa">Tanggal Sewa</label><br>
                                            <input type="date" class="form-control border" name="tgl_sewa" id="tgl_sewa"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $sewa->tgl_sewa }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_kembali">Tanggal Kembali</label><br>
                                            <input type="date" class="form-control border" name="tgl_kembali"
                                                id="tgl_kembali" autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $sewa->tgl_kembali }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_transaksi">Tanggal Transaksi</label><br>
                                            <input type="date" class="form-control border" name="tgl_transaksi"
                                                id="tgl_transaksi" autocomplete="off" required="required"
                                                placeholder="ketik" value={{ $sewa->tgl_transaksi }}>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
