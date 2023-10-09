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
                                <a href="/{{ $urlBreadcumb }}" class="link">
                                    Gaji Lembur </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="/{{ $urlBreadcumb2 }}" class="link">
                                    View List Data </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Lembur Karyawan {{ $textBreadcumb }}
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Edit Lembur Karyawan {{ $textBreadcumb }}</h1>
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3 pb-3 border-bottom">Data Karyawan</h5>
                    <form class="form-horizontal">
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">NIP</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="{{ $gaji->nip }}" value="{{ $gaji->nip }}" />
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Nama</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="{{ $gaji->nama }}" value="{{ $gaji->nama }}" />
                            </fieldset>
                        </div>
                        @if ($gaji->tipe_karyawan != 'pkwt')
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Jabatan</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="{{ $gaji->nama_jabatan }}" value="{{ $gaji->nama_jabatan }}" />
                            </fieldset>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Lembur</h5>
                            </div>
                            <div></div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="disabledTextInput">Lembur Weekend</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Jam Lembur"
                                    value="{{ $gaji->lembur_weekend }}" />
                            </div>
                            <div class="col-md-4">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Nominal</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Nominal"
                                        value="@rupiah(15000)" />
                                </fieldset>
                            </div>

                            <div class="col-md-2">
                                <label for="disabledTextInput">Lembur Weekday</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Jam Lembur"
                                    value="{{ $gaji->lembur_weekday }}" />
                            </div>
                            <div class="col-md-4">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Nominal</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Nominal"
                                        value="@rupiah(11000)" />
                                </fieldset>
                            </div>

                            <div></div>
                            <div class="md-3">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Gaji Lembur</h5>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Total Lembur Weekend</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan tetap" value="@rupiah($gaji->nominal_lembur_weekend)" />
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Total Lembur Weekday</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan bruto" value="@rupiah($gaji->nominal_lembur_weekday)" />
                                </fieldset>
                            </div>

                            <div class="mb-6 d-flex justify-content-end">
                                <a href="{{ url('/#') }}" class="btn btn-navy align-items-center ms-2">
                                    Save
                                </a>
                                <a href="{{ url('/#') }}" class="btn btn-merah align-items-center ms-2">
                                    Cancel
                                </a>
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
