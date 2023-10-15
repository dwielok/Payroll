@extends('layouts.connect')

@section('content')
    <div class="page-wrapper">
        <div class="page-titles">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="/dashboardSuperuser" class="link"><i data-feather="grid"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="/KaryawanTetapSuper" class="link">
                                    List Data Karyawan Tetap </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Import Data
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Import Data</h1>
                </div>
            </div>
        </div>
        <!-- ============================================================= -->
        <!-- Container fluid  -->
        <!-- ============================================================= -->
        <div class="container-fluid">
            <!-- ============================================================= -->
            <!-- Start Page Content -->
            <!-- ============================================================= -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="col-lg-12 col-md-12 d-none d-md-flex align-items-center justify-content-between mb-0">

                                <div class="container">
                                    <div class="row mt-0 justify-content-center">

                                        <div class="col-md-8">
                                            <h2 class="text-center mb-3 mt-3 " style="">Upload Or Import
                                                Data</h2>


                                        </div>

                                        {{-- notifikasi form validasi --}}
                                        @if ($errors->has('file'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('file') }}</strong>
                                            </span>
                                        @endif

                                        {{-- notifikasi sukses --}}
                                        @if ($sukses = Session::get('sukses'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $sukses }}</strong>
                                            </div>
                                        @endif

                                        <div class="d-flex justify-content-center w-100">

                                            <button type="button" class="btn btn-navy d-flex align-items-center ms-2"
                                                data-toggle="modal" data-target="#importTetap">
                                                Upload File
                                            </button>
                                        </div>

                                        <div class="modal fade" id="importTetap" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form method="post" action="{{ route('importTetapSuper') }}"
                                                enctype="multipart/form-data">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import File</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Cancel"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{ csrf_field() }}

                                                            <label>Pilih file excel</label>
                                                            <div class="form-group">
                                                                <input type="file" name="file" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-merah"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-navy d-flex align-items-center ms-2">Upload</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    @endsection
