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
                                <a href="/KaryawanInkaSuper" class="link">
                                    List Data Karyawan Perbantuan INKA </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Karyawan Perbantuan INKA
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Edit Karyawan Perbantuan INKA</h1>
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
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="20407632" />
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Nama</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Agus Setiawan" />
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Jabatan</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Staff" />
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Golongan</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="I/104" />
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title mb-3 pb-3 border-bottom">Gaji Pokok & Tunjangan Tetap</h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title mb-3 pb-3 border-bottom">Benefit</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Gaji</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Gaji Pokok" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Kesehatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="BPJS Kesehatan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Tetap</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Tetap" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Ketenagakerjaan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="BPJS Ketenagakerjaan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">PPIP</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="PPIP" />
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Tunjangan Tidak Tetap</h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Premi</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="disabledTextInput">Kehadiran</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Kehadiran" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Kesehatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="BPJS Kesehatan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                    <label for="disabledTextInput">Hari Kerja</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Hari Kerja" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Ketenagakerjaan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="BPJS Ketenagakerjaan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Nilai IKK</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Nilai IKK" />
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">PPIP Mandiri</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="PPIP Mandiri" />
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Dana IKK</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Dana IKK" />
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Potongan</h5>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Transportasi</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Transportasi" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Jam Hilang</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Jam Hilang" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Jabatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Jabatan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Kopinka</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Kopinka" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Karya</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Karya" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                    <label for="disabledTextInput">Keuangan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Keuangan" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Lembur</h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Penyesuaian</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="disabledTextInput">Lembur Weekend</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Jam Lembur" />
                            </div>
                            <div class="col-md-4">
                                <fieldset disabled>
                                <label for="disabledTextInput">Nominal</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Nominal" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Penyesuain Penambahan</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Penambahan">
                            </div>
                            <div class="col-md-2">
                                <label for="disabledTextInput">Lembur Weekdays</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Jam Lembur" />
                            </div>
                            <div class="col-md-4">
                                <fieldset disabled>
                                <label for="disabledTextInput">Nominal</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Nominal" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Penyesuain Pengurangan</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Pengurangan">
                            </div>

                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Gaji Akhir</h5>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Penghasilan Tetap</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="penghasilan tetap" />
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Penghasilan Bruto</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan bruto" />
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Penghasilan Netto</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="penghasilan netto" />
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
