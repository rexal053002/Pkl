<?php

namespace App\Http\Controllers\Api;
use App\Models\Kasuse;
use App\Models\Provinsi;
use App\Models\Kelurahan;
use App\Models\kecamatan;
use App\Models\Rw;
use App\Models\Kota;


use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    //
public function indonesia(){
    $positif = DB::table('rws')
                ->select('kasuses.positif',
                'kasuses.sembuh', 'kasuses.meninggal')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->sum('kasuses.positif');
    
    $sembuh = DB::table('rws')
                ->select('kasuses.positif',
                'kasuses.sembuh', 'kasuses.meninggal')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->sum('kasuses.sembuh');

    $meninggal = DB::table('rws')
                ->select('kasuses.positif',
                'kasuses.sembuh', 'kasuses.meninggal')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->sum('kasuses.meninggal');


    $res = [
        'success' => true,
        'data' => 'Data Kasus Indonesia',
        'positif' => $positif,
        'sembuh' => $sembuh,
        'meninggal' => $meninggal,
        'message' => 'Data Kasus Ditampilkan'
    ];
    return response()->json($res,200);
}
  public function provinsikasus($id){
    $positif = DB::table('provinsis')
                ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
                 ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
                 ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                 ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
                 ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
                 ->select('kasuses.positif')
                 ->where('provinsis.id',$id)
                 ->sum('kasuses.positif');

     $sembuh = DB::table('provinsis')
                ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
                ->select('kasuses.sembuh')
                ->where('provinsis.id',$id)
                ->sum('kasuses.sembuh');

    $meninggal = DB::table('provinsis')
                ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
                ->select('kasuses.meninggal')
                ->where('provinsis.id',$id)
                ->sum('kasuses.meninggal');

     $provinsi = Provinsi::whereId($id)->first();

    $res = [
        'success' => true,
        'nama_provinsi' => $provinsi['nama_provinsi'],
        'positif' => $positif,
        'sembuh' => $sembuh,
        'meninggal' => $meninggal,
        'message' => 'Data Berhasil DItampilkan'
    ];
    return response()->json($res, 200);
}

public function provinsi(){
    $kasus = DB::table('provinsis')
                 ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
                 ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
                 ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                 ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
                 ->join('kasuses', 'kasuses.id_rw', 'rws.id')
                 ->select( 'kode_provinsi','nama_provinsi',
                        DB::raw('sum(kasuses.positif) as Positif'),
                        DB::raw('sum(kasuses.sembuh) as sembuh'),
                        DB::raw('sum(kasuses.meninggal) as meninggal'),
                    )
                ->groupBy('kode_provinsi','nama_provinsi')
                ->get();

$res = [
    'status' => true,
    'message' => 'Menampilkan Provinsi',
    'data' => $kasus,
];

return response()->json($res, 200);
}


public function kota(){
    $kota = DB::table('kotas')
    ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
    ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
    ->join('kasuses', 'kasuses.id_rw', 'rws.id')
    ->select( 'nama_kota',
           DB::raw('sum(kasuses.positif) as Positif'),
           DB::raw('sum(kasuses.sembuh) as sembuh'),
           DB::raw('sum(kasuses.meninggal) as meninggal'),
       )
   ->groupBy('nama_kota')
   ->get();

$res = [
'status' => true,
'Data Kota' => $kota,
'message' => 'Menampilkan Kota',
];

return response()->json($res, 200);
}

public function kecamatan(){
    $kecamatan = DB::table('kecamatans')
    ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
    ->join('kasuses', 'kasuses.id_rw', 'rws.id')
    ->select( 'nama_kecamatan',
           DB::raw('sum(kasuses.positif) as Positif'),
           DB::raw('sum(kasuses.sembuh) as sembuh'),
           DB::raw('sum(kasuses.meninggal) as meninggal'),
       )
   ->groupBy('nama_kecamatan')
   ->get();

$res = [
'status' => true,
'Data Kota' => $kecamatan,
'message' => 'Menampilkan Kecamatan',
];

return response()->json($res, 200);
}

public function kelurahan(){
    
    $kelurahan = DB::table('kelurahans')
    ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
    ->join('kasuses', 'kasuses.id_rw', 'rws.id')
    ->select( 'nama_kelurahan',
           DB::raw('sum(kasuses.positif) as Positif'),
           DB::raw('sum(kasuses.sembuh) as sembuh'),
           DB::raw('sum(kasuses.meninggal) as meninggal'),
       )
   ->groupBy('nama_kelurahan')
   ->get();

$res = [
'status' => true,
'Data Kota' => $kelurahan,
'message' => 'Menampilkan kelurahan',
];

return response()->json($res, 200);

}

    public function global() {
        $url = Http::get('https://api.kawalcorona.com/')->json();
        $data = [
            'success => true',
            'data' => $url,
            'message' => 'Menampilkan data Global'
        ];
        return response()->json($data, 200);
    }

}