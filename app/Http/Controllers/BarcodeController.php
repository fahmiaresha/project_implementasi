<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class BarcodeController extends Controller
{
    public function display_barang(){
        $barang=DB::table('barang')->get();
        // dump($barang);
        return view ('/barcode/cetak-label-TnJ',['barang'=>$barang]);
    }

    public function barcode_scanner(){
        $barang=DB::table('barang')->get();
        return view ('/barcode/barcode-scanner',['barang'=>$barang]);
    }

    public function data_barcode($id){
        $barang = DB::table('barang')->where('id_barang',$id)->get();
        return json_encode($barang);
    }

    public function pdf_barcode($id){
        $barang = DB::table('barang')->where('id_barang',$id)->get();
        $barang_id=$id;
        $pdf = PDF::loadview('/barcode/pdf-barcode2',['barang'=>$barang,'barang_id'=>$barang_id])->setPaper('a4');
        return $pdf->stream();
           // $paper = array(0, 0, 51,0236, 107,717);
        //  $pdf->setPaper($paper);
        // $pdf->setPaper($paper,'landscape');
        // return view('/barcode/pdf-barcode',['barang'=>$barang,'barang_id'=>$barang_id]);
        
        
      
    }

}
