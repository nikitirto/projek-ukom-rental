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
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="simpan">
                                        @csrf

                                        <input type="number" name="id_sewa" id="id_sewa" value="{{ $sewa->id_sewa }}"
                                            hidden>

                                        <div class="form-group">
                                            <label for="id_customer">Customer</label><br>
                                            <select name="id_customer" id=""
                                                class="form-select form-control border">
                                                @foreach ($customer as $item)
                                                    <option value="{{ $item->id_customer }}"
                                                        {{ $sewa->id_customer === $item->id_customer ? 'selected' : '' }}>
                                                        ID: {{ $item->id_customer }} NAMA LENGKAP: {{ $item->nama_lengkap }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_mobil">Mobil</label><br>
                                            <select name="id_mobil" id="" class="form-select form-control border">
                                                @foreach ($mobil as $item)
                                                    <option value="{{ $item->id_mobil }}"
                                                        {{ $sewa->id_mobil === $item->id_mobil ? 'selected' : '' }}>
                                                        ID: {{ $item->id_mobil }} MEREK: {{ $item->merek }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_rek">Rekening</label><br>
                                            <select name="id_rek" id="" class="form-select form-control border">
                                                @foreach ($rekening as $item)
                                                    <option value="{{ $item->id_rek }}"
                                                        {{ $sewa->id_rek === $item->id_rek ? 'selected' : '' }}>
                                                        ID: {{ $item->id_rek }} NAMA BANK: {{ $item->nama_bank }}
                                                    </option>
                                                @endforeach
                                            </select>
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

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fa fa-plus"></i> Simpan</button>
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

                    </div>
                </div>
            </div>
        </div>
    @endsection
