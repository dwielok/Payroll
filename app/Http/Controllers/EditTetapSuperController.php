<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class EditTetapSuperController extends Controller
{
    function incrementAlpha($input, $count)
    {
        $letter = substr($input, 0, 1);
        $number = intval(substr($input, 1));

        if ($number >= $count) {
            $letter = chr(ord($letter) + 1);
            $number = 1;
        } else {
            $number++;
        }

        return $letter . $number;
    }

    private function getKenaikan($masa_kerja)
    {
        $tahun = 10;
        $awal = 3000000;
        $abjadAwal = 'A1';
        $kenaikan_per_tahun = 0.05;
        $kenaikan = $awal;
        $gajis = [];
        $awal = ['A1'];
        for ($i = 0; $i < $masa_kerja; $i++) {
            $abjadAwal = $this->incrementAlpha($abjadAwal, $tahun);
            array_push($awal, $abjadAwal);
            $kenaikan = $kenaikan + ($kenaikan * $kenaikan_per_tahun);
            $kenaikan = round($kenaikan);
            $gajis[$i] = [
                'gaji' => $kenaikan,
                'abjad' => $awal[$i],
            ];
        }
        return $gajis;
    }

    private function hitungJabatan($jabatan, $gaji_pokok)
    {
        //jabatan ada 2 Staff dan Manager
        if ($jabatan == 'Staff') {
            return 0.1 * $gaji_pokok;
        } else {
            return 0.2 * $gaji_pokok;
        }
    }

    private function hitungKehadiran($kehadiran)
    {
        return $kehadiran * 10000;
    }

    public function index(Request $request)
    {
        $id = $request->get('id');

        $gajis = GajiTemp::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_temp.*', 'pegawai.*', 'jabatan.*', 'gaji_temp.id as id_gaji')
            ->where('gaji_temp.id', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');
            return $item;
        });

        $gajis = PdfController::rumusTetap($gajis);

        $gaji = $gajis[0];

        return view('superuser.edit_tetap', compact('gaji'));
    }

    public function preview_gaji($id, Request $request)
    {
        $input = $request;
        $gajis = GajiTemp::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_temp.*', 'pegawai.*', 'jabatan.*', 'gaji_temp.id as id_gaji')
            ->where('gaji_temp.id', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) use ($input) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');

            $item->kehadiran = $input->kehadiran ?? $item->kehadiran;
            $item->hari_kerja = $input->hari_kerja ?? $item->hari_kerja;
            $item->nilai_ikk = $input->nilai_ikk ?? $item->nilai_ikk;
            $item->dana_ikk = $input->dana_ikk ?? $item->dana_ikk;
            $item->jam_hilang = $input->jam_hilang ?? $item->jam_hilang;
            $item->kopinka = $input->kopinka ?? $item->kopinka;
            $item->keuangan = $input->keuangan ?? $item->keuangan;
            $item->penyesuaian_penambahan = $input->penyesuaian_penambahan ?? $item->penyesuaian_penambahan;
            $item->penyesuaian_pengurangan = $input->penyesuaian_pengurangan ?? $item->penyesuaian_pengurangan;
            $item->ppip_mandiri = $input->ppip_mandiri ?? $item->ppip_mandiri;
            return $item;
        });

        $gajis = PdfController::rumusTetap($gajis);

        $gaji = $gajis[0];

        return response()->json($gaji);
    }
    public function preview_gaji_pkwt($id, Request $request)
    {
        $input = $request;
        $gajis = GajiPkwt::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_pkwt.id_karyawan')
            ->select('gaji_pkwt.*', 'pegawai.*', 'pegawai.pendidikan_terakhir as pendidikan', 'gaji_pkwt.id as id_gaji')
            ->where('gaji_pkwt.id', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) use ($input) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');

            $item->kehadiran = $input->kehadiran ?? $item->kehadiran;
            $item->hari_kerja = $input->hari_kerja ?? $item->hari_kerja;
            $item->nilai_ikk = $input->nilai_ikk ?? $item->nilai_ikk;
            $item->dana_ikk = $input->dana_ikk ?? $item->dana_ikk;
            $item->jam_hilang = $input->jam_hilang ?? $item->jam_hilang;

            $item->penyesuaian_penambahan = $input->penyesuaian_penambahan ?? $item->penyesuaian_penambahan;
            $item->penyesuaian_pengurangan = $input->penyesuaian_pengurangan ?? $item->penyesuaian_pengurangan;

            return $item;
        });

        $gajis = PdfController::rumusPkwt($gajis);

        $gaji = $gajis[0];

        return response()->json($gaji);
    }

    public function edit_gaji_tetap($id, Request $request)
    {
        $edit = GajiTemp::where('id', $id)->update([
            'kehadiran' => $request->kehadiran,
            'hari_kerja' => $request->hari_kerja,
            'nilai_ikk' => $request->nilai_ikk,
            'dana_ikk' => $request->dana_ikk,
            'jam_hilang' => $request->jam_hilang,
            'kopinka' => $request->kopinka,
            'keuangan' => $request->keuangan,
            'penyesuaian_penambahan' => $request->penyesuaian_penambahan,
            'penyesuaian_pengurangan' => $request->penyesuaian_pengurangan,
            'ppip_mandiri' => $request->ppip_mandiri,
        ]);

        $gaji_temp = GajiTemp::where('id', $id)->first();

        if ($edit) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengedit gaji',
                'data' => $gaji_temp
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengedit gaji'
            ]);
        }
    }
}
