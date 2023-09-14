<html>

<head>
    <title>Slip Gaji</title>
</head>

<tbody>

    {{-- buatkan tampilan html template slip gaji --}}
    {{-- @foreach ($gajis as $gaji) --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 1000px; height: 500px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" width="200px">
                            </div>
                            <div class="col-6">
                                <h3 class="text-center">SLIP GAJI</h3>
                                <h3 class="text-center">PT. KOPINKA AGRO</h3>
                                <h3 class="text-center">Periode </h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <table>
                                    <tr>
                                        <td>NIP</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->nip }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->nama }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->jabatan }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Golongan</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->golongan }}</td> --}}
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <table>
                                    <tr>
                                        <td>Gaji Pokok</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->gaji_pokok }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Tunjangan Tetap</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->tunjangan_tetap }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Kehadiran</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->kehadiran }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Hari Kerja</td>
                                        <td>:</td>
                                        {{-- <td>{{ $gaji->hari_kerja }}</td> --}}
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    {{-- @endforeach --}}
</tbody>

</html>
