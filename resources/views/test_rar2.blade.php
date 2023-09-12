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
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['nip'] }}</td>
                <td>{{ $data['jabatan'] }}</td>
                <td>{{ $data['golongan'] }}</td>
                <td>{{ $data['gaji_pokok'] }}</td>
                <td>{{ $data['tunjangan_tetap'] }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
