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
                                Download Template
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Download Template</h1>
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
                                class="
            col-lg-12 col-md-12
            d-none d-md-flex
            align-items-center
            justify-content-between
            mb-0
          ">
                                <div class="container">
                                    <div class="row mt-0">

                                        <div class="col-md-8">
                                            <h2 class="text-left mb-3 mt-3">Download Template</h2>
                                            <p>Download Template Gaji Karyawan
                                                <a
                                                    href="https://ungu.in/TemplateKaryawanTetapInka">Karyawan
                                                    Tetap dan Perbantuan INKA, </a>
                                                <a
                                                    href="https://ungu.in/TemplateKaryawanPkwt">Karyawan
                                                    PKWT </a>
                                            </p>
                                            <p>Download Template Gaji Lembur
                                                <a
                                                    href="https://ungu.in/TemplateGajiLembur">Karyawan
                                                    Tetap, Perbantuan INKA, dan PKWT </a>
                                            </p>
                                            {{-- <a class="btn btn-success btn-sm" href="download.php?file=file-download.txt">Click Here</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ============================================================= -->
                <!-- End PAge Content -->
                <!-- ============================================================= -->
            </div>
            <!-- ============================================================= -->
            <!-- End Container fluid  -->
            <!-- ============================================================= -->
            <!-- ============================================================= -->

        </div>
    @endsection
