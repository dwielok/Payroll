<table>
    <thead>
        <tr>
            <th>No</th>
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
                <td>{{ $loop->iteration }}</td>
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
