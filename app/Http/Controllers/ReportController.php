<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kasuse;
use DB;
use Illuminate\Support\Facades\Http;
class ReportController extends Controller
{
    public function index(){
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

                // Table Provinsi
    $ho = DB::table('provinsis')
    ->join('kotas','kotas.id_provinsi','=','provinsis.id')
    ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
    ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
    ->join('rws','rws.id_kelurahan','=','kelurahans.id')
    ->join('kasuses','kasuses.id_rw','=','rws.id')
    ->select('nama_provinsi',
            DB::raw('SUM(kasuses.positif) as positif'),
            DB::raw('SUM(kasuses.sembuh) as sembuh'),
            DB::raw('SUM(kasuses.meninggal) as meninggal'))
    ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
    ->get();

            return view('welcome', compact('positif','sembuh','meninggal','ho'));
    }
}
