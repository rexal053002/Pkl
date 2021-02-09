<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Kasuse;
use Illuminate\Support\Facades\Validator;
class KotaController extends Controller
{
   
    public function index()
    {
        //
        $kota = Kota::latest()->get();
        // berfungsi untuk menampilkan data yg ada di table kota($res)
        $res = [
            'success' => true,
            'data'    => $kota,
            'message' => 'Data Berhasil DItampilkan'
        ];
        return response()->json($res, 200);
    }

   
    public function create()
    {
        //
    }

   public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'kode_kota'     => 'required',
            'nama_kota'   => 'required',
        ],
            [
                'kode_kota.required' => 'Masukkan Kode Kota !',
                'nama_kota.required' => 'Masukkan Nama Kota !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $kota = Kota::create([
                'kode_kota'     => $request->input('kode_kota'),
                'nama_kota'   => $request->input('nama_kota')
            ]);
            if ($kota) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kota Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kota Gagal Disimpan!',
                ], 400);
            }
        }
    }
  public function show($id)
    {
        //
        $kota = Kota::whereId($id)->first();

        if ($kota) {
            return response()->json([
                'success' => true,
                'message' => 'Detail kota!',
                'data'    => $kota
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kota Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

   public function edit($id)
        {
        //
    }

  public function update(Request $request)
    {
    //     // //validate data
    //     $validator = Validator::make($request->all(), [
    //         'kode_kota'     => 'required',
    //         'nama_kota'   => 'required',
    //     ],
    //         [
    //             'kode_kota.required' => 'Masukkan kode_kota  !',
    //             'nama_kota.required' => 'Masukkan nama_kota  !',
    //         ]
    //     );

    //     if($validator->fails()) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Silahkan Isi Bidang Yang Kosong',
    //             'data'    => $validator->errors()
    //         ],400);

    //     } else {

    //         $kota = Kota::whereId($request->input('id'))->update([
    //             'kode_kota'     => $request->input('kode_kota'),
    //             'nama_kota'   => $request->input('nama_kota'),
    //         ]);


    //         if ($kota) {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Post Berhasil Diupdate!',
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Post Gagal Diupdate!',
    //             ], 500);
    //         }

    //     }

    }

    public function destroy($id)
    {
        // 
        $kota = Kota::findOrFail($id);
        $kota->delete();

        if ($kota) {
            return response()->json([
                'success' => true,
                'message' => 'Kota Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kota Gagal Dihapus!',
            ], 500);
        }

    }
    }