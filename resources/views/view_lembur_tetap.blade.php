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
                                <a href="/GajiLemburTetap" class="link">
                                    List Lembur Karyawan Tetap </a>
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

                                {{-- <div class="d-flex align-items-center g-2">

                                    <a href="{{ url('/ImportTetapSuper') }}"
                                        class="btn btn-navy d-flex align-items-center ms-2">
                                        Import
                                    </a>
                                    <a href="{{ url('/ExportTetapSuper') }}"
                                        class="btn btn-navy d-flex align-items-center ms-2">
                                        Export
                                    </a>
                                </div> --}}
                            </div>
                            <div class="table-responsive" style="overflow-x:auto;">
                                <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Lembur Weekend</th>
                                            <th class="text-center">Lembur Weekdays</th>
                                            <th class="text-center">Nominal Lembur Weekend</th>
                                            <th class="text-center">Nominal Lembur Weekdays</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gajis as $gaji)
                                            <tr>
                                                <td>{{ $gaji->bulan }}</td>
                                                <td>{{ $gaji->tahun }}</td>
                                                <td>{{ $gaji->nip }}</td>
                                                <td>{{ $gaji->nama }}</td>
                                                <td>{{ $gaji->lembur_weekend }}</td>
                                                <td>{{ $gaji->lembur_weekday }}</td>
                                                <td>@rupiah($gaji->nominal_lembur_weekend)</td>
                                                <td>@rupiah($gaji->nominal_lembur_weekday)</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
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
