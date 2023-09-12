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
                                Rekap Gaji
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Rekap Gaji</h1>
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

                                    <div class="btn-group" style="margin-left: 275px">
                                        <button class="btn btn-navy dropdown-toggle" type="button" id="dropdownMenuButton"
                                            aria-expanded="false">
                                            Filter Periode
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:300px">
                                            {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                                            <div class="row mt-4 ps-4 pe-4 pt-4 pb-4">
                                                <div class="col-6">
                                                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                        <div class="mb-3">
                                                            <input type="checkbox" id="md_checkbox_{{ $loop->iteration }}"
                                                                class="material-inputs filled-in chk-col-red">
                                                            <label
                                                                for="md_checkbox_{{ $loop->iteration }}">{{ $bulan }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-6">
                                                    @for ($tahun = 2017; $tahun <= 2023; $tahun++)
                                                        <div class="mb-3">
                                                            <input type="checkbox" id="md_checkbox_{{ $tahun }}"
                                                                class="material-inputs filled-in chk-col-red">
                                                            <label
                                                                for="md_checkbox_{{ $tahun }}">{{ $tahun }}</label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    {{-- <a href="javascript:void(0)" class="btn btn-navy d-flex align-items-center ms-2">
                                        Import
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-navy d-flex align-items-center ms-2">
                                        Export
                                    </a> --}}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Tahun</th>
                                            {{-- <th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ url('/test_pdf') }}" class="btn btn-navy d-flex align-items-center ms-2"
                                    style="margin-top: 30px">
                                    Print
                                </a>
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