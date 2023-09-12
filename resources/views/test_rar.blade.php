<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test RAR</title>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    @foreach ($data['gaji'] as $item)
        <b>Slip Gaji {{ $data['bulan'] }} {{ $data['tahun'] }}</b>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Tetap</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['nip'] }}</td>
                    <td>{{ $item['jabatan'] }}</td>
                    <td>{{ $item['golongan'] }}</td>
                    <td>{{ $item['gaji_pokok'] }}</td>
                    <td>{{ $item['tunjangan_tetap'] }}</td>
                </tr>
            </tbody>
        </table>
        <div class="page-break"></div>
    @endforeach
</body>

</html>
