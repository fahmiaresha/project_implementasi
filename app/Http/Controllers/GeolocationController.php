<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class GeolocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display_list_toko()
    {
        $lokasi_toko=DB::table('lokasi_toko')->get();
        return view('geolocation/list-toko',['lokasi_toko'=>$lokasi_toko]);
    }

    public function toko_barcode($id)
    {
        $toko = DB::table('lokasi_toko')->where('id_barcode',$id)->get();
        $id_toko=$id;
        $pdf = PDF::loadview('geolocation/toko-barcode',['toko'=>$toko,'id_toko'=>$id_toko])->setPaper('a4');
        return $pdf->stream();
        // return view('geolocation/toko-barcode',['toko'=>$toko,'id_toko'=>$id_toko]);
    }

    public function input_geolocation()
    {
        return view('geolocation/input-geolocation');
    }

    public function input_geolocation_store(Request $request)
    {
        DB::table('lokasi_toko')->insert(['nama_toko' => $request->nama,
        'alamat_toko' => $request->alamat,
        'latitude'=> $request->latitude,
        'longitude'=> $request->longitude,
        'accuracy'=> $request->accuracy,
        ]);
        return redirect('/input-geolocation')->with('insert','berhasil');
    }



    public function titik_kunjungan()
    {
        return view('geolocation/titik-kunjungan');
    }

    public function data_qrcode($id){
        $toko = DB::table('lokasi_toko')->where('id_barcode',$id)->get();
        return json_encode($toko);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
