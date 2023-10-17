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
                                <a href="{{ url('/ViewTetapSuper') }}" class="link">
                                    View List Data </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Karyawan Tetap
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Edit Karyawan Tetap</h1>
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
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Jabatan</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="{{ $gaji->nama_jabatan }}" value="{{ $gaji->nama_jabatan }}" />
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="disabledTextInput">Golongan</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholkode_jabatander="{{ $gaji->golongan }}" value="{{ $gaji->golongan }}" />
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
                                    <label for="disabledTextInput">Gaji Pokok</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder={{ $gaji->gaji_pokok }} value="@rupiah($gaji->gaji_pokok)" name="gaji_pokok" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Kesehatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder={{ $gaji->bpjs_kesehatan }} value="@rupiah($gaji->bpjs_kesehatan)"
                                        name="bpjs_kesehatan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Tetap</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder={{ $gaji->tunjangan_tetap }} value="@rupiah($gaji->tunjangan_tetap)"
                                        name="tunjangan_tetap" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Ketenagakerjaan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder={{ $gaji->bpjs_ketenagakerjaan }} value="@rupiah($gaji->bpjs_ketenagakerjaan)"
                                        name="bpjs_ketenagakerjaan" />
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">PPIP</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder={{ $gaji->ppip }} value="@rupiah($gaji->ppip)" name="ppip" />
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
                                    placeholder={{ $gaji->kehadiran }} value={{ $gaji->kehadiran }} name="kehadiran" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Kesehatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="BPJS Kesehatan" value="@rupiah($gaji->premi_bpjs_kesehatan)"
                                        name="premi_bpjs_kesehatan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Hari Kerja</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Hari Kerja" value="{{ $gaji->hari_kerja }}" name="hari_kerja"
                                    name="hari_kerja" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">BPJS Ketenagakerjaan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="BPJS Ketenagakerjaan" value="@rupiah($gaji->premi_bpjs_ketenagakerjaan)"
                                        name="premi_bpjs_ketenagakerjaan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Nilai IKK</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Nilai IKK" value="{{ $gaji->nilai_ikk }}" name="nilai_ikk" />
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">PPIP Mandiri</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="PPIP Mandiri" value="{{ $gaji->ppip_mandiri }}" name="ppip_mandiri" />
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Dana IKK</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Dana IKK"
                                    value="{{ $gaji->dana_ikk }}" name="dana_ikk" />
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Potongan</h5>
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Transportasi</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Transportasi" value="@rupiah($gaji->tunjangan_transportasi)"
                                        name="tunjangan_transportasi" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Jam Hilang</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Jam Hilang" value="{{ $gaji->jam_hilang }}" name="jam_hilang"
                                    name="jam_hilang" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Jabatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Jabatan" value="@rupiah($gaji->tunjangan_jabatan)"
                                        name="tunjangan_jabatan" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Kopinka</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Kopinka"
                                    value="{{ $gaji->kopinka }}" name="kopinka" />
                            </div>
                            <div class="col-md-6">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Tunjangan Karya</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Tunjangan Karya" value="@rupiah($gaji->tunjangan_karya)"
                                        name="tunjangan_karya" />
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="disabledTextInput">Keuangan</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Keuangan"
                                    value="{{ $gaji->keuangan }}" name="keuangan" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Lembur</h5>
                            </div> --}}
                            <div></div>
                            <div class="md-3">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Penyesuaian</h5>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-2">
                                <label for="disabledTextInput">Lembur Weekend</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Jam Lembur" />
                            </div> --}}
                            <div></div>
                            {{-- <div class="col-md-4">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Nominal</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="Nominal" />
                                </fieldset>
                            </div> --}}
                            <div class="md-3">
                                <label for="disabledTextInput">Penyesuaian Penambahan</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Penambahan" value="{{ $gaji->penyesuaian_penambahan }}"
                                    name="penyesuaian_penambahan" />
                            </div>
                            {{-- <div class="col-md-2">
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
                            </div> --}}
                            <div></div>
                            <div class="md-3">
                                <label for="disabledTextInput">Penyesuaian Pengurangan</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="Pengurangan" value="{{ $gaji->penyesuaian_pengurangan }}"
                                    name="penyesuaian_pengurangan" />
                            </div>

                            <div></div>
                            <div class="md-3">
                                <h5 class="card-title mt-3 pb-3 border-bottom">Gaji Akhir</h5>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Penghasilan Tetap</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan tetap" value="@rupiah($gaji->penghasilan_tetap)"
                                        name="penghasilan_tetap" />
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Penghasilan Bruto</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan bruto" value="@rupiah($gaji->penghasilan_bruto)"
                                        name="penghasilan_bruto" />
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Penghasilan Netto</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="penghasilan netto" value="@rupiah($gaji->penghasilan_netto)"
                                        name="penghasilan_netto" />
                                </fieldset>
                            </div>
                            <div class="mb-6 d-flex justify-content-end">
                                <a id="save-gaji" class="btn btn-navy align-items-center ms-2">
                                    Save
                                </a>
                                <a href="{{ url('/ViewInkaSuper?id=') . $gaji->id_ap }}"
                                    class="btn btn-merah align-items-center ms-2">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
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
                        url: "{{ url('/preview_gaji/') }}" + "/" + "{{ $gaji->id_gaji }}",
                        type: "POST",
                        data: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                            ...data
                        }),
                        contentType: "application/json",
                        success: function(data) {
                            console.log(data);
                            //set value input
                            $('input[name="penghasilan_tetap"]').val(formatRupiah(
                                data.penghasilan_tetap));
                            $('input[name="penghasilan_bruto"]').val(formatRupiah(
                                data.penghasilan_bruto));
                            $('input[name="penghasilan_netto"]').val(formatRupiah(
                                data.penghasilan_netto));
                            //tunjangan transportasi,tunjangan jabatan,tunjangan karya
                            $('input[name="tunjangan_transportasi"]').val(formatRupiah(
                                data
                                .tunjangan_transportasi));
                            $('input[name="tunjangan_jabatan"]').val(formatRupiah(data
                                .tunjangan_jabatan));
                            $('input[name="tunjangan_karya"]').val(formatRupiah(data
                                .tunjangan_karya));
                        }
                    });
                }, 2000);

                $(this).data('timer', timer);
            });

            $('#save-gaji').on('click', function() {
                var data = {};
                data['kehadiran'] = $('input[name="kehadiran"]').val();
                data['hari_kerja'] = $('input[name="hari_kerja"]').val();
                data['nilai_ikk'] = $('input[name="nilai_ikk"]').val();
                data['ppip_mandiri'] = $('input[name="ppip_mandiri"]').val();
                data['dana_ikk'] = $('input[name="dana_ikk"]').val();
                data['jam_hilang'] = $('input[name="jam_hilang"]').val();
                data['kopinka'] = $('input[name="kopinka"]').val();
                data['keuangan'] = $('input[name="keuangan"]').val();
                data['penyesuaian_penambahan'] = $('input[name="penyesuaian_penambahan"]').val();
                data['penyesuaian_pengurangan'] = $('input[name="penyesuaian_pengurangan"]').val();
                console.log(data);
                $.ajax({
                    url: "{{ url('/edit_gaji_tetap/') }}" + "/" + "{{ $gaji->id_gaji }}",
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
                                    window.location.href =
                                        "{{ url('/ViewInkaSuper?id=') }}" + data
                                        .data.id_approval
                                    // window.history.back();
                                }
                            })
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
