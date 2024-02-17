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

                                        <input type="number" name="id_mobil" id="id_mobil" value="{{ $mobil->id_mobil }}"
                                            hidden>
                                        <div class="form-group">
                                            <label for="id_kondisi">Kondisi</label><br>
                                            <input type="text" value="{{ $mobil->id_kondisi }}"
                                                class="form-control border">
                                        </div>

                                        <div class="form-group">
                                            <label for="id_kondisi">Deskripsi</label><br>
                                            <input type="text" value="{{ $mobil->deskripsi }}"
                                                class="form-control border">
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
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
