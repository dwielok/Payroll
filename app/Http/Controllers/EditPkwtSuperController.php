<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiPkwt;
use Illuminate\Http\Request;

class EditPkwtSuperController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id');
        $gajis = GajiPkwt::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_pkwt.id_karyawan')
            ->select('gaji_pkwt.*', 'pegawai.*', 'pegawai.pendidikan_terakhir as pendidikan', 'gaji_pkwt.id as id_gaji')
            ->where('gaji_pkwt.id', '=', $id)
            ->get();
        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');
            return $item;
        });

        $gajis = PdfController::rumusPkwt($gajis);

        $gaji = $gajis[0];
        return view('superuser.edit_pkwt', compact('gaji'));
    }

    public function edit_gaji_pkwt($id, Request $request)
    {
        $edit = GajiPkwt::where('id', $id)->update([
            'kehadiran' => $request->kehadiran,
            'hari_kerja' => $request->hari_kerja,
            'nilai_ikk' => $request->nilai_ikk,
            'dana_ikk' => $request->dana_ikk,
            'jam_hilang' => $request->jam_hilang,
            'penyesuaian_penambahan' => $request->penyesuaian_penambahan,
            'penyesuaian_pengurangan' => $request->penyesuaian_pengurangan,
        ]);

        $gaji_temp = GajiPkwt::where('id', $id)->first();

        if ($edit) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengedit gaji',
                'data' => $gaji_temp
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengedit gaji tetap'
            ]);
        }
    }
}
