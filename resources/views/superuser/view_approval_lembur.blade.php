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
                                <a href="{{ route('superuser.approval_lembur') }}" class="link">
                                    Approval </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                View List Data
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">List Data Karyawan {{ $tipe }}</h1>
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
                                <div class="input-group" style="width:20%; margin-left:50px">
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

                                @php
                                    if ($approval->status == '0') {
                                        $status = 'Disetujui';
                                    } elseif ($approval->status == '1') {
                                        $status = 'Ditolak';
                                    } else {
                                        $status = '';
                                    }
                                @endphp

                                <div class="d-flex align-items-center justify-content-center" style="margin-left: 55%">
                                    <button onclick="document.getElementById('form-approve-{{ $approval->id }}').submit();"
                                        type="button" @if ($approval->status != null) disabled='disabled' @endif
                                        class="btn btn-navy align-items-center ms-2">Approve</button>
                                    <button type="button" @if ($approval->status != null) disabled='disabled' @endif
                                        class="btn btn-merah align-items-center ms-2" data-bs-toggle="modal"
                                        data-bs-target="#modalDecline" data-bs-whatever="@fat">Decline</button>
                                </div>

                                <form method="POST" action="{{ route('superuser.approval.lembur.approve') }}"
                                    id="form-approve-{{ $approval->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $approval->id }}">
                                </form>

                                <!-- <button onclick="document.getElementById('form-approv-{{ $approval->id }}').submit();" type="button" @if ($approval->status != null) disabled='disabled' @endif class="btn btn-navy align-items-center ms-2" data-bs-toggle="modal" data-bs-target="#ModalApprove" data-bs-whatever="@fat">Approve</button> -->
                                <!-- Modal -->
                                <div class="modal fade" id="ModalApprove" tabindex="-1" aria-labelledby="ModalApproveLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="fw-bold">Succesfully Approve!</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-navy"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- tiap modal harus beda id gaoleh podo id ne ojo pakek exampleModal terus, sesuaiin sama nama fungsi misal modalApprove dll -->

                                <div class="modal fade" id="modalDecline" tabindex="-1" aria-labelledby="modalDeclineLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalDeclineLabel">
                                                    Keterangan Ditolak</h1>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('superuser.approval.lembur.decline') }}"
                                                    id="form-decline-{{ $approval->id }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="id" value="{{ $approval->id }}">
                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">Keterangan</label>
                                                        <textarea class="form-control" id="message-text" name="keterangan"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-merah"
                                                    data-dismiss="modal">Close</button>
                                                <button
                                                    onclick="document.getElementById('form-decline-{{ $approval->id }}').submit();"
                                                    type="button" class="btn btn-navy">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
