<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="text-center">Bulan</th>
            <th class="text-center">Tahun</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($gajis as $gaji)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gaji->bulan }}</td>
                <td>2020</td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
