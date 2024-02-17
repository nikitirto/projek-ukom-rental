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

                                        <input type="number" name="id_mobil" id="id_mobil" value="{{ $mobil->id_mobil }}"
                                            hidden>

                                        <div class="form-group">
                                            <label for="id_kondisi">Kondisi</label><br>
                                            <select name="id_kondisi" id=""
                                                class="form-select form-control border">
                                                @foreach ($kondisi as $item)
                                                    <option value="{{ $item->id_kondisi }}"
                                                        {{ $mobil->id_kondisi === $item->id_kondisi ? 'selected' : '' }}>
                                                        ID: {{ $item->id_kondisi }} DESKRIPSI: {{ $item->deskripsi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="merek">Nama Merk</label><br>
                                            <input type="text" class="form-control border" name="merek" id="merek"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value="{{ $mobil->merek }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="biaya">Biaya</label><br>
                                            <input type="text" class="form-control border" name="biaya" id="biaya"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $mobil->biaya }}>
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
