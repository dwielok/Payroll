@extends('layouts.connect')

@section('content')
    <div class="page-wrapper">
        <div class="page-titles">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="/dashboard" class="link"><i data-feather="grid"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="/KaryawanTetap" class="link">
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

                                        <div class="d-flex justify-content-center w-100">


                                            <button type="button" class="btn btn-navy d-flex align-items-center ms-2"
                                                data-toggle="modal" data-target="#exampleModal">
                                                Launch demo modal
                                            </button>
                                        </div>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Import File</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Cancel"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        {{ csrf_field() }}

                                                        <label>Pilih file excel</label>
                                                        <div class="form-group">
                                                            <input type="file" name="file" required="required">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-navy d-flex align-items-center ms-2"
                                                style="" data-toggle="modal" data-target="#importExcel">Upload
                                                File</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endsection

    </div>
</div>
@endsection

>>>>>>> 25fd80c2db14234f8df955b39a566a9b9c579e2d
