@extends('layouts.app')
@section('title','Customer-1')
@section('head')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Style -->
<link rel="stylesheet" href="../../vendors/select2/css/select2.min.css" type="text/css">

<!-- Javascript -->
<script src="../../vendors/select2/js/select2.min.js"></script>
@endsection
@section('content')


<div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Tambah Customer </h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Customer</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Customer 1</li>
                </ol>
            </nav>
        </div>
    </div>

    
    <div class="card">
        <div class="card-body">
        <form method="post" action="{{ url('/customer/store1') }}">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" name ="nama" id="nama" placeholder="Nama" >
           
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Alamat</label>
            <input type="text" class="form-control" name ="alamat" id="alamat" placeholder="Alamat" >
           
        </div>
              
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom03">Provinsi</label>
                   
                        <select name="provinsi" id="provinsi" class="select2-example">
                        <option value="0" disabled="true" selected="true">Pilih Provinsi</option>
                        @foreach ($provinsi as $ID_PROVINSI => $NAMA_PROVINSI)
                            <option value="{{ $ID_PROVINSI }}">{{ $NAMA_PROVINSI }}</option>
                        @endforeach
                       </select>
                      
               
                    </div>

                    <div class="col-md-3 mb-3">
                    <label for="validationCustom03">Kota</label>
                    <select class="select2-example" name="kota" id="kota">
                    <option value="0" disabled="true" selected="true">Pilih Kota</option>
                    </select>
                   
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom04">Kecamatan</label>
                    <select class="select2-example" name="kecamatan" id="kecamatan">
                    <option value="0" disable="true" selected="true">Pilih kecamatan</option>
                    </select>
                   
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom05">Kelurahan</label>
                    <select class="select2-example" name="kelurahan" id="kelurahan">
                    <option value="0" disable="true" selected="true">Pilih Kelurahan</option>
                    </select>
                   
                    </div>
                    <p id="hasil" style="border: 1px solid gray; width:200px; height:153px;" class="coba ml-2"></p>
                    

               <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                     <h5 class="modal-title">Foto</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                     </div>
                     <div class="modal-body">
                    
                    
                     <!--FOR THE SNAPSHOT-->
                     
                     <div class="form-row">
                     <div class="col-md-4">
                     <div id="camera" style="height:auto;width:auto; text-align:left;"></div>
                     </div>
                     <div class="col-md-2">
                     </div>
                     <div class="col-md-4 mt-2">
                     <p id="snapShot" style="border: 1px solid gray; width:200px; height:153px;"></p>
                     </div>
                        
                      

                     </div>
                     <div class="form-row">
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-3">
                     </div>
                     <div class="col-md-3">
                     <button type="button" class="btn btn-outline-info" id="btPic" onclick="takeSnapShot()">Ambil Foto</button>
                     </div>
                     </div>
                  

                     </div>
                     <div class="modal-footer">
                     <button type="button" class="btn btn-danger btn-square btn-uppercase" data-dismiss="modal" onclick="notsaveimage()" ><i class="ti-trash mr-2"></i> Back</button>
                     <button type="button" class="btn btn-success btn-uppercase"  data-dismiss="modal" onclick="saveimage()"> <i class="ti-check-box mr-2"></i> Save </button>
                     </div>
                  </div>
               </div>
               </div>

                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                     Ambil Foto
                  </button>
                <button class="btn btn-primary" type="submit">Simpan Data</button>
                </form>
        </div>
    </div>
    <script>
      
   </script>
    
@endsection

@section('script')
<script>
    // CAMERA SETTINGS.
    Webcam.set({
        width: 200,
        height: 170,
        image_format: 'jpeg',
        jpeg_quality: 100,
        flip_horiz: true
    });
    Webcam.attach('#camera');

    // SHOW THE SNAPSHOT.
    takeSnapShot = function () {
        Webcam.snap(function (data_uri) {
            document.getElementById('snapShot').innerHTML = 
                '<img src="' + data_uri + '" width="200px" height="153px" />';
               
        });
    }

    saveimage = function () {
        Webcam.snap(function (data_uri) {
         document.getElementById('hasil').innerHTML = 
                '<img src="' + data_uri + '" width="200px" height="153px" />'+
                '<input type="hidden" value="'+ data_uri +'" name="foto">' 
        });
    }
         
    function notsaveimage(){
               console.log('masuk function not save image');
               document.getElementById('hasil').innerHTML = '';
            }
         
</script>

<script src="../../vendors/select2/js/select2.min.js"></script>
<script>
  jQuery(document).ready(function ()
    {
      $('.select2-example').select2();
       console.log('masuk jquery');
            jQuery("#provinsi").change(function(){
               // e.stopPropagation();
               // console.log('masuk provinsi');
               var provinsi = jQuery(this).val();
               if(provinsi)
               {
               //  console.log('masuk if provinsi');
                  jQuery.ajax({
                     url : 'get_kota/' +provinsi,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        // console.log(data);
                        jQuery('select[name="kota"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="kota"]').empty();
                  // console.log('masuk else');
               }
            });

            jQuery('select[name="kota"]').on('change',function(){
               var kota = jQuery(this).val();
               if(kota)
               {
                console.log('masuk if kota');
                  jQuery.ajax({
                     url : 'get_kecamatan/' +kota,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="kecamatan"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="kecamatan"]').empty();
                  console.log('masuk else kecamatan');
               }
            });

            jQuery('select[name="kecamatan"]').on('change',function(){
               var kecamatan = jQuery(this).val();
               if(kecamatan)
               {
                console.log('masuk if kecamatan');
                  jQuery.ajax({
                     url : 'get_kelurahan/' +kecamatan,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="kelurahan"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value.NAMA_KELURAHAN + ' - '+ value.KODEPOS+'</option>');
                        }); 
                     }
                  });
               }
               else
               {
                  $('select[name="kelurahan"]').empty();
                  console.log('masuk else kelurahan');
               }
            });

    });
</script>
@if (session('insert'))
<script>
swal("Success!","Data Customer Berhasil Di Tambahkan","success");
</script>
@endif
@endsection