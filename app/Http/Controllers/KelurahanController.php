<?php

namespace App\Http\Controllers;

use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index',compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.create',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelurahan= new Kelurahan();
        $messages = [
            'required' => ': Data Wajib di isi',
            'unique' => ': Data tidak boleh sama',
        ];

        $this->validate($request,
        [
            'nama_kelurahan' => 'required | unique:kelurahans|regex: /^[a-z A-Z]+$/u',
            'id_kecamatan' => 'required|numeric',
        ],$messages);
        
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
            ->with(['message'=>'Data Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $kelurahan = Kelurahan::findOrFail($id);
        // return view('kelurahan.show',compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.edit',compact('kelurahan','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $messages = [
            'required' => ': Data Wajib di isi',
            'unique' => ': Data tidak boleh sama',
        ];

        $this->validate($request,
        [
            'nama_kelurahan' => 'required | unique:kelurahans|regex: /^[a-z A-Z]+$/u',
            'id_kecamatan' => 'required|numeric',
        ],$messages);

        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')
                        ->with(['message1'=>'Berhasil dihapus']);
    }
}