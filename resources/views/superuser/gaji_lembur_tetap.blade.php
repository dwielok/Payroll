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
                                Gaji Lembur Karyawan Tetap
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Gaji Lembur Karyawan Tetap</h1>
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

                                <div class="btn-group">
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
                                                            class="material-inputs filled-in chk-col-red month-filter filter-checkbox">
                                                        <label
                                                            for="md_checkbox_{{ $loop->iteration }}">{{ $bulan }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-6">
                                                @for ($tahun = 2017; $tahun <= 2023; $tahun++)
                                                    <div class="mb-3">
                                                        <input type="checkbox" id="md_checkbox_{{ $tahun }}"
                                                            class="material-inputs filled-in chk-col-red year-filter filter-checkbox">
                                                        <label
                                                            for="md_checkbox_{{ $tahun }}">{{ $tahun }}</label>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-center g-2">

                                    <a href="{{ url('/ImportLemburTetapSuper?type=tetap') }}"
                                        class="btn btn-navy d-flex align-items-center ms-2">
                                        Import
                                    </a>
                                    {{-- <a href="javascript:void(0)" class="btn btn-navy d-flex align-items-center ms-2">
                                        Export
                                    </a> --}}
                                    <a href="{{ url('/ExportLembur?type=tetap') }}"
                                        class="btn btn-navy d-flex align-items-center ms-2">
                                        Export
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered text-center myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($approvals as $approval)
                                            @php
                                                if ($approval->status == '0') {
                                                    $status = 'Disetujui';
                                                    $warna = 'success';
                                                    $button = true;
                                                } elseif ($approval->status == '1') {
                                                    $status = 'Ditolak';
                                                    $warna = 'danger';
                                                    $button = true;
                                                } else {
                                                    $status = 'Menunggu Persetujuan';
                                                    $warna = 'warning';
                                                    $button = true;
                                                }
                                            @endphp
                                            <tr>
                                                <td class="month-column">{{ __($approval->bulan) }}</td>
                                                <td class="year-column">{{ __($approval->year) }}</td>
                                                <td class="text-{{ $warna }}">
                                                    {{ $status }}</td>
                                                <td>{{ __($approval->keterangan) }}</td>
                                                <td>
                                                    <form action="{{ url('/viewLemburTetap') }}" method="get"
                                                        id="form-view-{{ $approval->id }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $approval->id }}">
                                                    </form>
                                                    <button type="button" class="btn btn-navy align-items-center ms-2"
                                                        {{ !$button ? 'disabled' : '' }}
                                                        onclick="document.getElementById('form-view-{{ $approval->id }}').submit()">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>

                                    {{-- <tfoot>
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot> --}}
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
