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
                                        <input type="number" name="id_kondisi" value="{{ $kondisi->id_kondisi }}" hidden>
                                        <div class="form-group">
                                            <label for="id_servis">ID Servis</label>
                                            <input type="text" name="id_servis" id="id_servis"
                                                value="{{ $kondisi->id_servis }}" class="form-control border">

                                            <label for="id_servis">Tanggal Servis</label>
                                            <input type="text" name="id_servis" id="id_servis"
                                                value="{{ $kondisi->tgl_servis }}" class="form-control border">

                                            <label for="id_servis">No Parts</label>
                                            <input type="text" name="id_servis" id="id_servis"
                                                value="{{ $kondisi->no_parts }}" class="form-control border">

                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <br>
                                                <textarea name="deskripsi" id="deskripsi" cols="50" rows="5">{{ $kondisi->deskripsi }}</textarea>
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
