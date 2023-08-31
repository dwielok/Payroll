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
                                <a href="/karyawanPKWT" class="link">
                                List Data Karyawan PKWT </a>
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
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Golongan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tunjangan Tetap</th>
                                            <th>Kehadiran</th>
                                            <th>Hari Kerja</th>
                                            <th>Nilai IKK</th>
                                            <th>Dana IKK</th>
                                            <th>Tunjangan Transportasi</th>
                                            <th>Tunjangan Profesional</th>
                                            <th>Tunjangan Karya</th>
                                            <th>BPJS Kesehatan</th>
                                            <th>BPJS Ketenagakerjaan</th>
                                            <th>Jam Hilang</th>
                                            <th>Penghasilan Tetap</th>
                                            <th>Lembur Weekdays</th>
                                            <th>Lembur Weekend</th>
                                            <th>Penyesuaian Penambahan</th>
                                            <th>Penyesuaian Pengurangan</th>
                                            <th>Penghasilan Bruto</th>
                                            <th>Penghasilan Netto</th>
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
