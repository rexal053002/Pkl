<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kasuse;
use Illuminate\Support\Facades\Validator;
class KecamatanController extends Controller
{
   
    public function index()
    {
        //
        $kecamatan = Kecamatan::latest()->get();
        // berfungsi untuk menampilkan data yg ada di table kecamatan($res)
        $res = [
            'success' => true,
            'data'    => $kecamatan,
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
            'kode_kecamatan'     => 'required',
            'nama_kecamatan'   => 'required',
        ],
            [
                'kode_kecamatan.required' => 'Masukkan Kode Kecamatan !',
                'nama_kecamatan.required' => 'Masukkan Nama Kecamatan !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $kecamatan = Kecamatan::create([
                'kode_kecamatan'     => $request->input('kode_kecamatan'),
                'nama_kecamatan'   => $request->input('nama_kecamatan')
            ]);
            if ($kecamatan) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kecamatan Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kecamatan Gagal Disimpan!',
                ], 400);
            }
        }
    }
  public function show($id)
    {
        //
        $kecamatan = Kecamatan::whereId($id)->first();

        if ($kecamatan) {
            return response()->json([
                'success' => true,
                'message' => 'Detail kecamatan!',
                'data'    => $kecamatan
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kecamatan Tidak Ditemukan!',
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
    //         'kode_kecamatan'     => 'required',
    //         'nama_kecamatan'   => 'required',
    //     ],
    //         [
    //             'kode_kecamatan.required' => 'Masukkan kode_kecamatan  !',
    //             'nama_kecamatan.required' => 'Masukkan nama_kecamatan  !',
    //         ]
    //     );

    //     if($validator->fails()) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Silahkan Isi Bidang Yang Kosong',
    //             'data'    => $validator->errors()
    //         ],400);

    //     } else {

    //         $kecamatan = Kecamatan::whereId($request->input('id'))->update([
    //             'kode_kecamatan'     => $request->input('kode_kecamatan'),
    //             'nama_kecamatan'   => $request->input('nama_kecamatan'),
    //         ]);


    //         if ($kecamatan) {
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
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        if ($kecamatan) {
            return response()->json([
                'success' => true,
                'message' => 'Kecamatan Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kecamatan Gagal Dihapus!',
            ], 500);
        }

    }
    }