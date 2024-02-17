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
                                    <form method="POST" action="simpan" enctype="multipart/form-data">
                                        @csrf

                                        <input type="number" name="id_customer" id="id_customer"
                                            value="{{ $customer->id_customer }}" hidden>

                                        <div class="form-group">
                                            <label for="id_user"></label><br>
                                            <select name="id_user" id="" class="form-select form-control border">
                                                @foreach ($user as $item)
                                                    <option value="{{ $item->id_user }}"
                                                        {{ $customer->id_user === $item->id_user ? 'selected' : '' }}>
                                                        ID: {{ $item->id_user }} USERNAME {{ $item->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat_rumah">Alamat Rumah</label><br>
                                            <textarea name="alamat_rumah" id="alamat_rumah" cols="50" rows="5">{{ $customer->alamat_rumah }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label><br>
                                            <input type="text" class="form-control border" name="nama_lengkap"
                                                id="nama_lengkap" autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $customer->nama_lengkap }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="kode_pos">Kode Pos</label><br>
                                            <input type="number" class="form-control border" name="kode_pos" id="kode_pos"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $customer->kode_pos }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp">No Telp</label><br>
                                            <input type="number" class="form-control border" name="no_telp" id="no_telp"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $customer->no_telp }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto_ktp">Foto KTP</label><br>
                                            <input type="file" name="foto_ktp" id="foto_ktp"
                                                class="form-control border">
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
