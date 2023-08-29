@extends('layouts.connect')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-titles">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="index.html" class="link"><i data-feather="grid"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Rekap Gaji
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Rekap Gaji</h1>
                </div>
                <div
                    class="
            col-lg-4 col-md-6
            d-none d-md-flex
            align-items-center
            justify-content-end
          ">
                    {{-- <select class="form-select theme-select border-0" aria-label="Default select example">
                        <option value="1">Filter Periode</option>
                        <option value="2">Today 24 March</option>
                        <option value="3">Today 25 March</option>
                    </select> --}}
                    <div class="btn-group">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:300px">
                            {{-- <li><a class="dropdown-item" href="#">Filter</a></li> --}}
                            <div class="row mt-4 ps-4 pe-4 pt-4 pb-4">
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_21" class="material-inputs filled-in chk-col-red"
                                        checked="">
                                    <label for="md_checkbox_21">Januari</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_22"
                                        class="material-inputs filled-in chk-col-pink" checked="">
                                    <label for="md_checkbox_22">Pink</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_23"
                                        class="material-inputs filled-in chk-col-purple" checked="">
                                    <label for="md_checkbox_23">Purple</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_24"
                                        class="material-inputs filled-in chk-col-deep-purple" checked="">
                                    <label for="md_checkbox_24">Deep Purple</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_25"
                                        class="material-inputs filled-in chk-col-indigo" checked="">
                                    <label for="md_checkbox_25">Indigo</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_26"
                                        class="material-inputs filled-in chk-col-blue" checked="">
                                    <label for="md_checkbox_26">Blue</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_27"
                                        class="material-inputs filled-in chk-col-light-blue" checked="">
                                    <label for="md_checkbox_27">Light Blue</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_28"
                                        class="material-inputs filled-in chk-col-cyan" checked="">
                                    <label for="md_checkbox_28">Cyan</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_29"
                                        class="material-inputs filled-in chk-col-teal" checked="">
                                    <label for="md_checkbox_29">Teal</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_30"
                                        class="material-inputs filled-in chk-col-green" checked="">
                                    <label for="md_checkbox_30">Green</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_31"
                                        class="material-inputs filled-in chk-col-light-green" checked="">
                                    <label for="md_checkbox_31">Light green</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_32"
                                        class="material-inputs filled-in chk-col-lime" checked="">
                                    <label for="md_checkbox_32">Lime</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_33"
                                        class="material-inputs filled-in chk-col-yellow" checked="">
                                    <label for="md_checkbox_33">Yellow</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_34"
                                        class="material-inputs filled-in chk-col-amber" checked="">
                                    <label for="md_checkbox_34">Amber</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_35"
                                        class="material-inputs filled-in chk-col-orange" checked="">
                                    <label for="md_checkbox_35">Orange</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_36"
                                        class="material-inputs filled-in chk-col-deep-orange" checked="">
                                    <label for="md_checkbox_36">Deep Orange</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_37"
                                        class="material-inputs filled-in chk-col-brown" checked="">
                                    <label for="md_checkbox_37">Brown</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_38"
                                        class="material-inputs filled-in chk-col-grey" checked="">
                                    <label for="md_checkbox_38">Grey</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_39"
                                        class="material-inputs filled-in chk-col-blue-grey" checked="">
                                    <label for="md_checkbox_39">Blue Grey</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" id="md_checkbox_40"
                                        class="material-inputs filled-in chk-col-black" checked="">
                                    <label for="md_checkbox_40">Black</label>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <a href="javascript:void(0)" class="btn btn-info d-flex align-items-center ms-2">
                        Print
                    </a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
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
                    <div class="card" <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
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
