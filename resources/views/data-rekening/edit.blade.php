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

                                        <input type="number" name="id_rek" id="id_rek" value="{{ $rekening->id_rek }}"
                                            hidden>

                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label><br>
                                            <input type="text" class="form-control border" name="nama_bank"
                                                id="nama_bank" autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $rekening->nama_bank }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_rek">No Rek</label><br>
                                            <input type="text" class="form-control border" name="no_rek" id="no_rek"
                                                autocomplete="off" required="required" placeholder="ketik"
                                                value={{ $rekening->no_rek }}>
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
    ;
