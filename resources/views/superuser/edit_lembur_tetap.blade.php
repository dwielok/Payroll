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
                                    value="{{ $gaji->lembur_weekend }}" name="lembur_weekend" />
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
                                    value="{{ $gaji->lembur_weekday }}" name="lembur_weekday" />
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
                                        placeholder="penghasilan tetap" value="@rupiah($gaji->nominal_lembur_weekend)"
                                        name="nominal_lembur_weekend" />
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Total Lembur Weekday</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan bruto" value="@rupiah($gaji->nominal_lembur_weekday)"
                                        name="nominal_lembur_weekday" />
                                </fieldset>
                            </div>

                            <div class="mb-6 d-flex justify-content-end">
                                <a id="save-gaji" class="btn btn-navy align-items-center ms-2">
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

@push('customScripts')
    <script>
        $(document).ready(function() {
            //format rupiah
            function formatRupiah(angka) {
                // Menggunakan metode toLocaleString dengan konfigurasi sesuai kebutuhan
                return "Rp. " + angka.toLocaleString("id-ID", {
                    minimumFractionDigits: 0, // Menampilkan 0 desimal
                    maximumFractionDigits: 0, // Maksimum 0 desimal
                });
            }

            console.log(formatRupiah(10000000));

            //onchange all input
            $('input').on('input', function() {
                clearTimeout($(this).data('timer'));
                //get value from input
                var input = $(this).val();
                //remove dot
                var input = input.replace(/\./g, '');
                //convert string to number
                // var input = parseInt(input);
                //convert number to rupiah
                // var input = input.toLocaleString('id-ID');
                //set value input
                $(this).val(input);

                //get name
                var name = $(this).attr('name');

                console.log(name, input);

                //remove dot in input
                // var input = input.replace(/\./g, '');

                //delay 2 second to hit ajax
                //change name to {name:input}
                var data = {};
                data[name] = input;
                var timer = setTimeout(function() {
                    $.ajax({
                        url: "{{ url('/preview_gaji_lembur/') }}" + "/" +
                            "{{ $gaji->id_gaji }}",
                        type: "POST",
                        data: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                            ...data
                        }),
                        contentType: "application/json",
                        success: function(data) {
                            console.log(data);
                            //set value input
                            $('input[name="nominal_lembur_weekend"]').val(formatRupiah(
                                data.nominal_lembur_weekend));
                            $('input[name="nominal_lembur_weekday"]').val(formatRupiah(
                                data.nominal_lembur_weekday));
                        }
                    });
                }, 2000);

                $(this).data('timer', timer);
            });

            $('#save-gaji').on('click', function() {
                var data = {};
                data['lembur_weekend'] = $('input[name="lembur_weekend"]').val();
                data['lembur_weekday'] = $('input[name="lembur_weekday"]').val();
                console.log(data);
                $.ajax({
                    url: "{{ url('/edit_gaji_lembur/') }}" + "/" + "{{ $gaji->id_gaji }}",
                    type: "POST",
                    data: JSON.stringify({
                        "_token": "{{ csrf_token() }}",
                        ...data
                    }),
                    contentType: "application/json",
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            Swal.fire(
                                'Success',
                                data.message,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    if (data.data.approval.tipe_karyawan == 'tetap') {
                                        window.location.href =
                                            "{{ url('/viewLemburTetap?id=') }}" +
                                            data.data
                                            .approval.id
                                    } else if (data.data.approval.tipe_karyawan ==
                                        'inka') {
                                        window.location.href =
                                            "{{ url('/viewLemburInka?id=') }}" +
                                            data.data
                                            .approval.id
                                    } else {
                                        window.location.href =
                                            "{{ url('/viewLemburPkwt?id=') }}" +
                                            data.data
                                            .approval.id
                                    }
                                }
                            })
                            // window.location.href = "{{ url('/ViewTetapSuper?id=') }}" + data
                            //     .data.id_approval
                            // window.history.back();
                        } else {
                            alert(data.message)
                        }
                    }
                });
            });
        });
    </script>
@endpush
