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

                                        <div class="d-flex justify-content-center w-100">
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
        </div>
    @endsection
