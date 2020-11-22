<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\provinsi;
use App\kota;
use App\kecamatan;
use App\kelurahan;
use Response;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function display_customer()
    {
        $customer = DB::table('customer')->get();
        return view('customer/DataCustomer',['customer'=>$customer]);
    }

    public function user_manual()
    {
       //PDF file is stored under project/public/download/info.pdf
    $file= public_path(). "/download/user-manual-website.pdf";
    $headers = [
        'Content-Type' => 'application/pdf',
     ];

    return Response::download($file, 'user-manual-website.pdf', $headers);
    }

    public function customer_store1(Request $request)
    {
        //ID CUSTOMER BELUM AUTO INCREMENT
        DB::table('customer')->insert(['NAMA' => $request->nama,
        'ALAMAT' => $request->alamat,
        'FOTO' => $request->foto,
        'ID_KELURAHAN'=> $request->kelurahan,
        ]);
        return redirect('/tambah-customer1')->with('insert','berhasil');
   
    }


    public function customer_store2(Request $request)
    {
        $base64_str = substr($request->foto, strpos($request->foto, ",")+1);
        $foto = base64_decode($base64_str) ;
        $nama_foto = $request->nama_foto;
        $path = '/file_foto/Customer'.$nama_foto.'.jpeg';
        Storage::put('/public'.$path,$foto);

        DB::table('customer')->insert(['NAMA' => $request->nama,
        'ALAMAT' => $request->alamat,
        'FILE_PATH' => '/storage'.$path,
        'ID_KELURAHAN'=> $request->kelurahan,
        ]);
        return redirect('/tambah-customer2');
   
    }

    public function display_image($filename){
    $path =  storage_public('storage/file_foto/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
    }

    public function create_customer1()
    {
        $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('customer/Customer-1', ['provinsi' => $provinsi,]);
    }

    public function create_customer2()
    {
        $customer = DB::table('customer')->get();
        // dump($customer);
        $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('customer/Customer-2', ['provinsi' => $provinsi,'customer'=>$customer]);
    }

    public function get_kota($id){
        $kota = DB::table("kota")->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA","ID_KOTA");
        return json_encode($kota);
      }
  
      public function get_kecamatan($id){
        $kecamatan = DB::table("kecamatan")->where("ID_KOTA",$id)->pluck("NAMA_KECAMATAN","ID_KECAMATAN");
        return json_encode($kecamatan);
      }

      public function get_kelurahan($id){
        
        // $kelurahan = DB::table("kelurahan")->where("ID_KECAMATAN",$id)->pluck("NAMA_KELURAHAN","ID_KELURAHAN","KODEPOS");
        $kelurahan = DB::table("kelurahan")->where("ID_KECAMATAN",$id)->get();
     
        return json_encode($kelurahan);
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
