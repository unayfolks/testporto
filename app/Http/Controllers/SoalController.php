<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function submit(Request $request)
    {
        $kls = $request->kelas;
        $noin = $request->noinduk;
        $kdplayer = $kls . $noin;
        $sbmt = DB::table('player')->insert([
            'kodeplayer' => $kdplayer,
            'nama' => $request->nama,
            'noinduk' => $request->noinduk,
            'kelas' => $request->kelas,
        ]);
        $hasil = [
            'success' => true,
            'data' => $sbmt,
        ];
        return response()->json($hasil);
    }
    public function showplayer($id)
    {
        $rew = DB::table('player')->where('noinduk', $id)->get();

        return response()->json($rew);
    }
    public function getplayer($id)
    {
        $sdjf = DB::table('player')->where('id', $id)->get();

        return response()->json($sdjf);
    }
    public function tambahsoal(Request $request)
    {
        DB::beginTransaction();
        try {
            DB::table('jenissoal')
                ->insert([
                    'kode_soal' => $request->data1['kodesoal'],
                    'namasoal' => $request->data1['namasoal'],
                    'kelassoal' => $request->data1['kelas'],
                    'pelajaran' => $request->data1['pelajaran'],
                ]);
            $item = $request->data2;
            foreach ($item as $itm) {
                $file = $request->file($itm['gambar']);
                $namagambar = $kode . $file->getClientOriginalExtension();
                $tujuan_upload = 'img/gambarsoal';
                $file->move($tujuan_upload, $namagambar);
                $simpansoal = [
                    [
                        'kd_soal' => $itm['kodesoal'],
                        'gambar' => $namagambar,
                        'pertanyaan' => $itm['pertanyaan'],
                        'jawaban1' => $itm['jwb1'],
                        'jawaban2' => $itm['jwb2'],
                        'jawaban3' => $itm['jwb3'],
                        'jawaban4' => $itm['jwb4'],
                        'jawaban5' => $itm['jwb5'],
                    ],
                ];
                DB::table('soal')->insert($simpansoal);
            }
            $hasil = [
                'success' => true,
                'message' => 'Soal telah ditambahkan',
            ];
            DB::commit();
        } catch (\Exception$e) {
            DB::rollback();
            $hasil = [
                'success' => false,
                'message' => 'Soal tidak dapat disimpan',
            ];
        }
        return response()->json($hasil);
    }
    public function generatecode()
    {
        $kode = date('YmdHis');
        return response()->json($kode);
    }
}
