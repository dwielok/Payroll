<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class ApprovalSuperController extends Controller
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

    public function index()
    {
        $approvals = Approval::all();
        return view('superuser.approval', compact('approvals'));
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        $tipe = $request->get('tipe');

        switch ($tipe) {
            case 'tetap':
                $tipe = 'Tetap';
                break;
            case 'inka':
                $tipe = 'Perbantuan INKA';
                break;
            case 'pkwt':
                $tipe = 'PKWT';
                break;

            default:
                # code...
                break;
        }

        $approval = Approval::where('id', $id)->first();

        if ($approval->tipe_karyawan != 'pkwt') {
            $gajis = GajiTemp::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_temp.id_karyawan')
                ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
                ->select('gaji_temp.*', 'pegawai.*', 'jabatan.*')
                ->where('gaji_temp.id_approval', '=', $id)
                ->get();
            $gajis = $gajis->map(function ($item) {
                $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
                $item->year = Approval::where('id', $item->id_approval)->value('year');
                return $item;
            });
            $gajis = PdfController::rumusTetap($gajis);
            return view('superuser.view_approval', compact('gajis', 'approval', 'tipe'));
        } else {
            $gajis = GajiPkwt::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_pkwt.id_karyawan')
                ->select('gaji_pkwt.*', 'pegawai.*', 'pegawai.pendidikan_terakhir as pendidikan')
                ->where('gaji_pkwt.id_approval', '=', $id)
                ->get();
            $gajis = $gajis->map(function ($item) {
                $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
                $item->year = Approval::where('id', $item->id_approval)->value('year');
                return $item;
            });
            $gajis = PdfController::rumusPkwt($gajis);
            return view('superuser.view_approval_pkwt', compact('gajis', 'approval', 'tipe'));
        }
        // dd($gajis);

    }

    public function decline(Request $request)
    {
        $approval = Approval::where('id', $request->id)->update([
            'status' => 1,
            'keterangan' => $request->keterangan //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ViewApprovalSuper?id=' . $request->id);
    }

    public function approve(Request $request)
    {
        $approval = Approval::where('id', $request->id)->update([
            'status' => 0,
            'keterangan' => '-' //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ViewApprovalSuper?id=' . $request->id);
    }
}
