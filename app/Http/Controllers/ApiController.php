<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\barang;

class ApiController extends Controller
{
    public function show()
    {
        // return response()->json(DB::table('barang')->get(),200);
        return response()->json(barang::all(),200);
    }

    public function insert(Request $request)
    {
        // DB::table('barang')->insert(['nama_barang' => $request->nama_barang,
        // 'deskripsi_barang' => $request->deskripsi_barang
        // ]);
        // return response()->json([
        //     "message" => "Barang Berhasil Di input!"
        // ],201);
        $barang = new barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->save();
         return response()->json([
            "message" => "Barang Berhasil Di input!",
             "data" => $barang
        ],201);
    }

    public function update(Request $request,$id){
        $cek_barang = barang::firstWhere('id_barang',$id);
        if($cek_barang){
            $barang = barang::find($id);
            $barang->nama_barang = $request->nama_barang;
            $barang->deskripsi_barang = $request->deskripsi_barang;
            $barang->save();
            return response()->json([
                "message" => "Barang Berhasil Di Update!",
                 "data" => $barang
            ],200);
        } else {
            return response()->json([
                "message" => "Id barang tidak ditemukan!"
            ],404);
        }
    }
}
