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
                                <a href="/karyawanperbantuaninka" class="link">
                                List Data Karyawan Perbantuan INKA </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                View List Data
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">List Data</h1>
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
            <!-- basic table -->
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
            mb-4
          ">
                                <div class="d-flex align-items-center g-2">
                                    <div class="input-group" style="position: absolute; width:20%; margin:50px">
                                        <span class="input-group-prepend">
                                            <button class="btn btn-outline-secondary bg-white border-end-0  border ms-n5"
                                                type="button">
                                                <i data-feather="search"></i>
                                            </button>
                                        </span>
                                        <input class="form-control border-start-0 border" type="search" value="search"
                                            id="example-search-input">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive-" style="overflow-x:auto;">
                                <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Golongan</th>
                                            <th class="text-center">Gaji Pokok</th>
                                            <th class="text-center">Tunjangan Tetap</th>
                                            <th class="text-center">Kehadiran</th>
                                            <th class="text-center">Hari Kerja</th>
                                            <th class="text-center">Nilai IKK</th>
                                            <th class="text-center">Dana IKK</th>
                                            <th class="text-center">Tunjangan Transportasi</th>
                                            <th class="text-center">Tunjangan Jabatan</th>
                                            <th class="text-center">Tunjangan Karya</th>
                                            <th class="text-center">BPJS Kesehatan</th>
                                            <th class="text-center">BPJS Ketenagakerjaan</th>
                                            <th class="text-center">PPIP</th>
                                            <th class="text-center">PPIP Mandiri</th>
                                            <th class="text-center">Jam Hilang</th>
                                            <th class="text-center">Kopinka</th>
                                            <th class="text-center">Keuangan</th>
                                            <th class="text-center">Penghasilan Tetap</th>
                                            <th class="text-center">Lembur Weekdays</th>
                                            <th class="text-center">Lembur Weekend</th>
                                            <th class="text-center">Penyesuaian Penambahan</th>
                                            <th class="text-center">Penyesuaian Pengurangan</th>
                                            <th class="text-center">Penghasilan Bruto</th>
                                            <th class="text-center">Penghasilan Netto</th>
                                        </tr>
                                    </thead>
                                </table>
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