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

                                        <input type="number" name="id_servis" id="id_servis"
                                            value="{{ $servis->id_servis }}" hidden>

                                        <div class="form-group">
                                            <label for="no_parts">No Parts</label><br>
                                            <input type="text" class="form-control border" name="no_parts" id="no_parts"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $servis->no_parts }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_servis">Tanggal Servis</label><br>
                                            <input type="date" class="form-control border" name="tgl_servis"
                                                id="tgl_servis" autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $servis->tgl_servis }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_parts">Id Parts</label><br>
                                            <input type="number" class="form-control border" name="id_parts" id="id_parts"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $servis->id_parts }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_parts_ganti">No Parts Ganti</label><br>
                                            <input type="number" class="form-control border" name="no_parts_ganti"
                                                id="no_parts_ganti" autocomplete="off" required="required"
                                                placeholder="ketik" value={{ $servis->no_parts_ganti }}>
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
