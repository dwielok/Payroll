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
                            Approval
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Approval Gaji Karyawan</h1>
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
                        <div class="
            col-lg-12 col-md-12
            d-none d-md-flex
            align-items-center
            justify-content-between
            mb-4
          ">

                            {{-- <div class="input-group" style="position: absolute; width:20%; margin:50px">
                                    <span class="input-group-prepend">
                                        <button class="btn btn-outline-secondary bg-white border-end-0  border ms-n5"
                                            type="button">
                                            <i data-feather="search"></i>
                                        </button>
                                    </span>
                                    <input class="form-control border-start-0 border" type="search" value="search"
                                        id="example-search-input">
                                </div> --}}

                            <div class="btn-group">
                                <button class="btn btn-navy dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                                    Filter Periode
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:300px">
                                    {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                                    <div class="row mt-4 ps-4 pe-4 pt-4 pb-4">
                                        <div class="col-6">
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                            <div class="mb-3">
                                                <input type="checkbox" id="md_checkbox_{{ $loop->iteration }}" class="material-inputs filled-in chk-col-red month-filter filter-checkbox">
                                                <label for="md_checkbox_{{ $loop->iteration }}">{{ $bulan }}</label>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="col-6">
                                            @for ($tahun = 2017; $tahun <= 2023; $tahun++) <div class="mb-3">
                                                <input type="checkbox" id="md_checkbox_{{ $tahun }}" class="material-inputs filled-in chk-col-red year-filter filter-checkbox">
                                                <label for="md_checkbox_{{ $tahun }}">{{ $tahun }}</label>
                                        </div>
                                        @endfor
                                    </div>
                            </div>
                            </ul>
                        </div>

                        <!-- <div class="btn-group">
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
                                </div> -->


                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered text-center myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Tipe Karyawan</th>
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
                                $button = false;
                                } else {
                                $status = 'Menunggu Persetujuan';
                                $warna = 'warning';
                                $button = false;
                                }
                                @endphp
                                <tr>
                                    <td class="month-column">{{ __($approval->bulan) }}</td>
                                    <td class="year-column">{{ __($approval->year) }}</td>
                                    <td>{{ __($approval->tipe_karyawan) }}</td>
                                    <td class="text-{{ $warna }}">
                                        {{ $status }}
                                    </td>
                                    <td>{{ __($approval->keterangan) }}</td>
                                    <td>
                                        <a href="{{ url('/ViewApprovalSuper?id=' . $approval->id . '&tipe=' . $approval->tipe_karyawan) }}""
                                                        class=" btn btn-navy align-items-center ms-2">
                                            View
                                        </a>
                                    </td>
                                    {{-- <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button
                                                        onclick="document.getElementById('form-approve-{{ $approval->id }}').submit();"
                                    type="button"
                                    @if ($approval->status != null) disabled='disabled' @endif
                                    class="btn btn-navy align-items-center ms-2">Approve</button>
                                    <button type="button" @if ($approval->status != null) disabled='disabled' @endif
                                        class="btn btn-merah align-items-center ms-2" data-bs-toggle="modal"
                                        data-bs-target="#modalDecline"
                                        data-bs-whatever="@fat">Decline</button>
                    </div>

                    <!-- <a href="{{ url('/') }}" class="btn btn-navy align-items-center ms-2">
                                                        Approve
                                                    </a> -->

                    <form method="POST" action="{{ route('superuser.approval.approve') }}" id="form-approve-{{ $approval->id }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $approval->id }}">
                    </form>

                    <!-- <button onclick="document.getElementById('form-approv-{{ $approval->id }}').submit();" type="button" @if ($approval->status != null) disabled='disabled' @endif class="btn btn-navy align-items-center ms-2" data-bs-toggle="modal" data-bs-target="#ModalApprove" data-bs-whatever="@fat">Approve</button> -->
                    <!-- Modal -->
                    <div class="modal fade" id="ModalApprove" tabindex="-1" aria-labelledby="ModalApproveLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="fw-bold">Succesfully Approve!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-navy" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tiap modal harus beda id gaoleh podo id ne ojo pakek exampleModal terus, sesuaiin sama nama fungsi misal modalApprove dll -->

                    <div class="modal fade" id="modalDecline" tabindex="-1" aria-labelledby="modalDeclineLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalDeclineLabel">
                                        Keterangan Ditolak</h1>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('superuser.approval.decline') }}" id="form-decline-{{ $approval->id }}">
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
                                    <button type="button" class="btn btn-merah" data-dismiss="modal">Close</button>
                                    <button onclick="document.getElementById('form-decline-{{ $approval->id }}').submit();" type="button" class="btn btn-navy">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    </td> --}}
                    </tr>
                    @empty
                    @endforelse

                    </tbody>

                    {{-- <tfoot>
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Tipe Karyawan</th>
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