<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kasuse;
use Illuminate\Support\Facades\Validator;
class KelurahanController extends Controller
{
   
    public function index()
    {
        //
        $kelurahan = Kelurahan::latest()->get();
        // berfungsi untuk menampilkan data yg ada di table kelurahan($res)
        $res = [
            'success' => true,
            'data'    => $kelurahan,
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
            'kode_kelurahan'     => 'required',
            'nama_kelurahan'   => 'required',
        ],
            [
                'kode_kelurahan.required' => 'Masukkan Kode Kelurahan !',
                'nama_kelurahan.required' => 'Masukkan Nama Kelurahan !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $kelurahan = Kelurahan::create([
                'kode_kelurahan'     => $request->input('kode_kelurahan'),
                'nama_kelurahan'   => $request->input('nama_kelurahan')
            ]);
            if ($kelurahan) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kelurahan Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kelurahan Gagal Disimpan!',
                ], 400);
            }
        }
    }
  public function show($id)
    {
        //
        $kelurahan = Kelurahan::whereId($id)->first();

        if ($kelurahan) {
            return response()->json([
                'success' => true,
                'message' => 'Detail kelurahan!',
                'data'    => $kelurahan
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kelurahan Tidak Ditemukan!',
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
    //         'kode_kelurahan'     => 'required',
    //         'nama_kelurahan'   => 'required',
    //     ],
    //         [
    //             'kode_kelurahan.required' => 'Masukkan kode_kelurahan  !',
    //             'nama_kelurahan.required' => 'Masukkan nama_kelurahan  !',
    //         ]
    //     );

    //     if($validator->fails()) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Silahkan Isi Bidang Yang Kosong',
    //             'data'    => $validator->errors()
    //         ],400);

    //     } else {

    //         $kelurahan = Kelurahan::whereId($request->input('id'))->update([
    //             'kode_kelurahan'     => $request->input('kode_kelurahan'),
    //             'nama_kelurahan'   => $request->input('nama_kelurahan'),
    //         ]);


    //         if ($kelurahan) {
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
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();

        if ($kelurahan) {
            return response()->json([
                'success' => true,
                'message' => 'Kelurahan Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kelurahan Gagal Dihapus!',
            ], 500);
        }

    }
    }