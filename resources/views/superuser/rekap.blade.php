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
                        <div class="
            col-lg-12 col-md-12
            d-none d-md-flex
            align-items-center
            justify-content-between
            mb-4
          ">
                            <div class="d-flex align-items-center g-2">


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
                            {{-- <a href="javascript:void(0)" class="btn btn-navy d-flex align-items-center ms-2">
                                        Import
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-navy d-flex align-items-center ms-2">
                                        Export
                                    </a> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered text-nowrap myTable">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="md_checkbox_all" class="filled-in chk-col-red check-all" />
                                    </th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Tahun</th>
                                    {{-- <th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($slips as $slip)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="md_checkbox_{{ $loop->iteration }}" data-id="{{ json_encode($slip) }}" class="filled-in chk-col-red check-item" name="check-item" />
                                    </td>
                                    <td class="text-center month-column">{{ $slip->bulan }}</td>
                                    <td class="text-center year-column">{{ $slip->tahun }}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a id="print" class="btn btn-navy d-flex align-items-center ms-2" style="margin-top: 30px">
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
@push('customScripts')
<script>
    //create array to store selected rows
    var selected = [];

    //check all checkboxes when the one in a table head is checked
    $('#md_checkbox_all').change(function(e) {
        if ($(this).prop('checked')) {
            $('.check-item').prop('checked', true);

            //push all data to selected array
            $('.check-item').each(function() {
                selected.push($(this).data('id'));
            });
        } else {
            $('.check-item').prop('checked', false);

            //clear selected array
            selected = [];
        }
    });

    //get the id of the checkbox that was clicked
    $('.check-item').click(function(e) {
        var id = $(this).data('id');
        if ($(this).prop('checked')) {
            selected.push(id);
        } else {
            selected.splice(selected.indexOf(id), 1);
        }
        console.log(selected);
    });

    //print clicked then ajax to test_rar
    $('#print').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ url('generate_zip') }}",
            type: "POST",
            data: JSON.stringify({
                _token: "{{ csrf_token() }}",
                data: selected
            }),
            contentType: "application/json; charset=utf-8",
            beforeSend: function() {
                $('#print').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                );
                //disabled
                $('#print').attr('disabled', true);
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    //download file with response.link
                    window.location.href = response.link;
                }
                $('#print').html('Print');
                //enabled
                $('#print').attr('disabled', false);
            },
            error: function(xhr) {
                console.log(xhr);
                $('#print').html('Print');
                //enabled
                $('#print').attr('disabled', false);
            }
        });
    });
</script>
@endpush