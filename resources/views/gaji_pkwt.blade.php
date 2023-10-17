<table id="zero_config" class="table table-striped table-bordered text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th class="text-center">Bulan</th>
            <th class="text-center">Tahun</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Pendidikan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Kehadiran</th>
            <th class="text-center">Hari Kerja</th>
            <th class="text-center">Nilai IKK</th>
            <th class="text-center">Dana IKK</th>
            <th class="text-center">Tunjangan Transportasi</th>
            <th class="text-center">Tunjangan Profesional</th>
            <th class="text-center">Tunjangan Karya</th>
            <th class="text-center">BPJS Kesehatan Benefit</th>
            <th class="text-center">BPJS Ketenagakerjaan Benefit</th>
            <th class="text-center">Total Benefit</th>
            <th class="text-center">BPJS Kesehatan Premi</th>
            <th class="text-center">BPJS Ketenagakerjaan Premi</th>
            <th class="text-center">Total Premi</th>
            <th class="text-center">Total Potongan Benefit</th>
            <th class="text-center">Jam Hilang</th>
            <th class="text-center">Penyesuaian Penambahan</th>
            <th class="text-center">Penyesuaian Pengurangan</th>
            <th class="text-enter">Potongan</th>
            <th class="text-center">Penghasilan Tetap</th>
            <th class="text-enter">Penghasilan Tidak Tetap</th>
            <th class="text-center">Penghasilan Bruto</th>
            <th class="text-center">Penghasilan Netto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gajis as $gaji)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gaji->bulan }}</td>
                <td>{{ $gaji->tahun }}</td>
                <td>{{ $gaji->nip }}</td>
                <td>{{ $gaji->nama }}</td>
                <td>{{ $gaji->pendidikan }}</td>
                <td>@rupiah($gaji->gaji_pokok)</td>
                <td>{{ $gaji->kehadiran }}</td>
                <td>{{ $gaji->hari_kerja }}</td>
                <td>{{ $gaji->nilai_ikk }}</td>
                <td>@rupiah($gaji->dana_ikk)</td>
                <td>@rupiah($gaji->tunjangan_transportasi)</td>
                <td>@rupiah($gaji->tunjangan_profesional)</td>
                <td>@rupiah($gaji->tunjangan_karya)</td>
                <td>@rupiah($gaji->bpjs_kesehatan)</td>
                <td>@rupiah($gaji->bpjs_ketenagakerjaan)</td>
                <td>@rupiah($gaji->benefit)</td>
                <td>@rupiah($gaji->premi_bpjs_kesehatan)</td>
                <td>@rupiah($gaji->premi_bpjs_ketenagakerjaan)</td>
                <td>@rupiah($gaji->premi)</td>
                <td>@rupiah($gaji->benefit)</td>
                <td>{{ $gaji->jam_hilang }}</td>
                <td>{{ $gaji->penyesuaian_penambahan }}</td>
                <td>{{ $gaji->penyesuaian_pengurangan }}</td>
                <td>@rupiah($gaji->potongan)</td>
                <td>@rupiah($gaji->penghasilan_tetap)</td>
                <td>@rupiah($gaji->penghasilan_tidak_tetap)</td>
                <td>@rupiah($gaji->penghasilan_bruto)</td>
                <td>@rupiah($gaji->penghasilan_netto)</td>
            </tr>
        @endforeach
    </tbody>
</table>
