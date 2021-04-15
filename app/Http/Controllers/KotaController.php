<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Models\kota;
use App\Http\Controllers\DB; ###
use Illuminate\Http\Request;

class KotaController extends Controller
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
        $kota = Kota::with('provinsi')->get();
        return view('kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('kota.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kota' => 'required|max:4|unique:kotas|min:0|integer',
            'nama_kota' => 'required|unique:kotas'

        ],
        [
            'kode_kota.required' => 'Kode Harap Diisi!',
            'kode_kota.max' => 'Kode Max 4 Digit',
            'kode_kota.unique' => 'Kode Sudah Terpakai',
            'nama_kota.required' => 'Nama Kota Harap Diisi!',
            'nama_kota.unique' => 'Nama Sudah Terpakai',
            'kode_kota.min' => 'Kode Min 0 Digit!',
            'kode_kota.integer' => 'Kode integer!'

        ]);

        $kota= new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
            ->with(['message'=>'Data Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $kota = Kota::findOrFail($id);
        // return view('kota.show',compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('kota.edit',compact('kota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kota' => 'required|max:4|min:0|integer',
            'nama_kota' => 'required'

        ],
        [
            'kode_kota.required' => 'Kode Harap Diisi!',
            'kode_kota.max' => 'Kode Max 4 Digit',
            'nama_kota.required' => 'Nama Kota Harap Diisi!',
            'kode_kota.min' => 'Kode Min 0 Digit!',
            'kode_kota.integer' => 'Kode integer!'

        ]);
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index');
    }
}
