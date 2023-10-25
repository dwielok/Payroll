<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024px, initial-scale=1">
    <title>Slip Gaji</title>
    <style>
        @page {
            size: portrait;
        }

        body {
            margin: 0;
        }

        * {
            font-size: 0.8rem;
        }

        .salary-slip {
            margin: 15px;
            text-align: left;
        }

        .empDetail {
            width: 100%;
            text-align: left;
            border: 2px solid black;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .head {
            margin: 10px;
            margin-bottom: 50px;
            width: 100%;
        }

        .companyName {
            text-align: left;
            font-size: 25px;
            font-weight: bold;
        }

        .salaryMonth {
            text-align: left;
        }

        .table-border-bottom {
            border-bottom: 1px solid;
        }

        .table-border-right {
            border-right: 1px solid;
        }

        .myBackground {
            padding-top: 10px;
            text-align: left;
            border: 1px solid black;
            height: 40px;
            background-color: #c2d69b;
        }

        .myAlign {
            text-align: left;
            border-right: 1px solid black;
        }

        .myTotalBackground {
            padding-top: 10px;
            text-align: left;
            background-color: #EBF1DE;
            border-spacing: 0px;
        }

        .align-4 {
            width: 25%;
            float: right;
        }

        .tail {
            margin-top: 35px;
        }

        .align-2 {
            margin-top: 25px;
            width: 50%;
            float: left;
        }

        .border-center {
            text-align: left;
        }

        .border-center th,
        .border-center td {
            border: 1px solid black;
        }

        th,
        td {
            padding-left: 6px;
        }
    </style>
</head>

<body>
    <div class="salary-slip">
        <table class="empDetail">
            <tr style="height: 20rem">
                <td colspan='4'>
                    <img height="50px" src="https://ptrekaindo.co.id/wp-content/uploads/2019/07/Logo-Reka-1000.png">
                </td>
                <td colspan='4' class="companyName">SLIP GAJI {{ $gaji->bulan }} {{ $gaji->tahun }}</td>
            </tr>
            <tr>
                <th style="text-align: left">
                    Nama
                </th>
                <td>
                    {{ $gaji->nama }}
                </td>
                <td></td>
                <td></td>
                <th style="text-align: left">
                    NIP
                </th>
                <td>
                    {{ $gaji->nip }}
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th style="text-align: left">
                    Jabatan
                </th>
                <td>
                    {{ $gaji->nama_jabatan ?? '-' }}
                </td>
                <td></td>
                <td></td>
                <th style="text-align: left">
                    Golongan
                </th>
                <td>
                    {{ $gaji->golongan ?? '-' }}
                </td>
                <td></td>
                <td class="table-border-left"></td>
            <tr class="myBackground">
                <th colspan="2" style="text-align: left">
                    PENDAPATAN
                </th>
                <th>
                </th>
                <th class="table-border-right">
                    JUMLAH (Rp.)
                </th>
                <th colspan="2" style="text-align: left">
                    POTONGAN
                </th>
                <th>
                </th>
                <th>
                    JUMLAH (Rp.)
                </th>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    1. GAJI POKOK
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->gaji_pokok)
                </td>
                <td colspan="2" style="text-align: left">
                    1. POT. BPJS KETENAGAKERJAAN
                </td>
                <td></td>

                <td class="myAlign">
                    @rupiah($gaji->premi_bpjs_ketenagakerjaan)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    2. TUNJANGAN TETAP
                </td>
                <td></td>

                <td class="myAlign">
                    @rupiah($gaji->tunjangan_tetap)
                </td>
                <td colspan="2" style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JHT
                </td>
                <td></td>

                <td class="myAlign">
                    {{-- @rupiah($gaji->premi_bpjs_kesehatan) --}}
                    @rupiah($gaji->detail_premi_bpjs_tk->jht)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    3. TUNJANGAN PROFESIONAL (PKWT)
                </td>
                <td></td>

                <td class="myAlign">
                    @rupiah($gaji->tunjangan_profesional)
                </td>
                <td colspan="2" style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JP
                </td>
                <td></td>

                <td class="myAlign">
                    {{-- @rupiah($gaji->premi_ppip) --}}
                    @rupiah($gaji->detail_premi_bpjs_tk->jp)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    4. TUNJANGAN TRANSPORTASI
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->tunjangan_transportasi)
                </td>
                <td colspan="2" style="text-align: left">
                    2. POT. BPJS KESEHATAN
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->premi_bpjs_kesehatan)
                    {{-- @rupiah($gaji->potongan_keuangan) --}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    5. TUNJANGAN KARYA
                </td>
                <td></td>

                <td class="myAlign">
                    @rupiah($gaji->tunjangan_karya)
                </td>
                <td colspan="2" style="text-align: left">
                    3. POT. PPIP
                </td>
                <td></td>

                <td class="myAlign">
                    @rupiah($gaji->premi_ppip)
                    {{-- @rupiah($gaji->potongan_kopinka) --}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    6. TUNJANGAN TRANSISI/RAPEL
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->penyesuaian_penambahan)
                </td>
                <td colspan="2" style="text-align: left">
                    4. POT. KEUANGAN
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->potongan_keuangan)
                    {{-- @rupiah($gaji->potongan_jam_hilang) --}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">
                    7. BENEFIT
                    {{-- <ul style="list-style: none;">
                        <li>
                            BPJS KETENAGAKERJAAN
                            <ul style="list-style: none">
                                <li>JKK</li>
                                <li>JKM</li>
                                <li>JHT</li>
                                <li>JP</li>
                            </ul>
                        </li>
                        <li>BPJS KESEHATAN</li>
                        <li>PPIP</li>
                        <li>JUMLAH PREMI</li>
                    </ul> --}}
                </td>
                <td></td>
                <td class="myAlign">
                    {{-- <ul style="list-style: none;">
                        <li>@rupiah($gaji->bpjs_kesehatan)</li>
                        <li></li>
                        <li>00</li>
                        <li>00</li>
                        <li>00</li>
                        <li>00</li>
                        <li>00</li>
                        <li>00</li>
                    </ul> --}}

                </td>
                <td colspan="2"style="text-align: left;vertical-align:top;">
                    5. POT. KOPINKA
                </td>
                <td></td>
                <td class="myAlign" style="vertical-align:top;">
                    @rupiah($gaji->potongan_kopinka)
                    {{-- @rupiah($gaji->potongan_premi) --}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    &nbsp;&nbsp;&nbsp; BPJS KETENAGAKERJAAN
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->bpjs_ketenagakerjaan)
                </td>
                <td colspan="2" style="text-align: left;">
                    6. JAM HILANG
                </td>
                <td></td>
                <td class="myAlign" style="vertical-align: top;">
                    @rupiah($gaji->potongan_jam_hilang)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;vertical-align:top">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JKK
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->detail_bpjs_tk->jkk)
                </td>
                <td colspan="2" style="text-align: left;">
                    7. PENYESUAIAN
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->penyesuaian_pengurangan)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;vertical-align:top">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JKM
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->detail_bpjs_tk->jkm)
                </td>
                <td colspan="2" style="text-align: left;">
                    8. BENEFIT
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->potongan_benefit)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;vertical-align:top">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JHT
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->detail_bpjs_tk->jht)
                </td>
                <td colspan="2" style="text-align: left">
                    9. GAJI LEMBUR BULAN KEMARIN
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->lembur_kemarin)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;vertical-align:top">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JP
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->detail_bpjs_tk->jp)
                </td>
                <th colspan="3" style="text-align: left">

                </th>
                <td class="myAlign">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    &nbsp;&nbsp;&nbsp; BPJS KESEHATAN
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->bpjs_kesehatan)
                </td>
                <th colspan="3" style="text-align: left">
                </th>
                <td class="myAlign">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    &nbsp;&nbsp;&nbsp; PPIP
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->ppip)
                </td>
                <th colspan="3" style="text-align: left">
                </th>
                <td class="myAlign">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">
                    &nbsp;&nbsp;&nbsp; JUMLAH PREMI
                </td>
                <td></td>
                <td class="myAlign">
                    @rupiah($gaji->jumlah_premi)
                </td>
                <th colspan="3" style="text-align: left">
                </th>
                <td class="myAlign">
                </td>
            </tr>
            <tr class="myBackground">
                <th colspan="3" style="text-align: left">
                    JUMLAH PENDAPATAN BRUTO
                </th>
                <td class="myAlign">
                    @rupiah($gaji->penghasilan_bruto)
                </td>
                <th colspan="3" style="text-align: left">
                    JUMLAH POTONGAN
                </th>
                <td class="myAlign">
                    @rupiah($gaji->potongan)
                </td>
            </tr>
            <tr height="40px">
                <td colspan="2" class="table-border-bottom" style="text-align: left">
                    <b>PENDAPATAN NETTO</b>
                </td>
                <td></td>
                <td class="table-border-right">
                    <b>@rupiah($gaji->penghasilan_netto)</b>
                </td>
                <td colspan="3" style="text-align: right">
                    Madiun, {{ date('d F Y') }}
                </td>
                <td></td>
            </tr>
            {{-- <tr>
                <td colspan="2">
                </td>
                <td></td>
                <td class="myAlign">
                </td>
                <td colspan="4"></td>
            </tr> --}}
            <tr>
                <td colspan="2" style="text-align: left">
                    Saldo PPIP (PKWTT)
                </td>
                <td></td>
                <td class="table-border-right">
                    @rupiah($gaji->ppip_mandiri)
                </td>
                <td colspan="3" style="text-align: right">
                    Presiden Direktur
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align: top">
                    Nilai Kredit Poin
                </td>
                <td></td>
                <td class="myAlign" style="vertical-align: top">
                    {{ $gaji->kredit_poin }}
                </td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align: top">
                    Nilai IKK
                </td>
                <td></td>
                <td class="myAlign" style="vertical-align: top">
                    {{ $gaji->nilai_ikk }}
                </td>
                <td colspan="3" style="text-align: right; height: 100px;">
                    <b><u> A. Wishnudartha Pagehgiri </u></b>
                </td>
                <td></td>
            </tr>
            {{-- <tr>
                <td colspan="2" style="vertical-align: top">
                    Nilai Kredit Poin
                </td>
                <td></td>
                <td class="myAlign" style="vertical-align: top">
                    00.00
                </td>
                <td colspan="4"></td>
            </tr> --}}
        </table>
    </div>
</body>

</html>
