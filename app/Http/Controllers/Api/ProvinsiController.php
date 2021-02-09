<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kasuse;
use Illuminate\Support\Facades\Validator;
class ProvinsiController extends Controller
{
   
    public function index()
    {
        //
        $provinsi = Provinsi::latest()->get();
        // berfungsi untuk menampilkan data yg ada di table provinsi($res)
        $res = [
            'success' => true,
            'data'    => $provinsi,
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
            'kode_provinsi'     => 'required',
            'nama_provinsi'   => 'required',
        ],
            [
                'kode_provinsi.required' => 'Masukkan Kode Provinsi !',
                'nama_provinsi.required' => 'Masukkan Nama Provinsi !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $provinsi = Provinsi::create([
                'kode_provinsi'     => $request->input('kode_provinsi'),
                'nama_provinsi'   => $request->input('nama_provinsi')
            ]);
            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi Gagal Disimpan!',
                ], 400);
            }
        }
    }
  public function show($id)
    {
        //
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail provinsi!',
                'data'    => $provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Tidak Ditemukan!',
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
    //         'kode_provinsi'     => 'required',
    //         'nama_provinsi'   => 'required',
    //     ],
    //         [
    //             'kode_provinsi.required' => 'Masukkan kode_provinsi  !',
    //             'nama_provinsi.required' => 'Masukkan nama_provinsi  !',
    //         ]
    //     );

    //     if($validator->fails()) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Silahkan Isi Bidang Yang Kosong',
    //             'data'    => $validator->errors()
    //         ],400);

    //     } else {

    //         $provinsi = Provinsi::whereId($request->input('id'))->update([
    //             'kode_provinsi'     => $request->input('kode_provinsi'),
    //             'nama_provinsi'   => $request->input('nama_provinsi'),
    //         ]);


    //         if ($provinsi) {
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
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Gagal Dihapus!',
            ], 500);
        }

    }
    }