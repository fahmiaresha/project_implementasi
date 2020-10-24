@extends('layouts.app')
@section('title','Barcode Scanner')

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
            <h3>Barcode Scanner</h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a href="#">Barang</a>
                    </li> -->
                    <li class="breadcrumb-item active" aria-current="page">Barcode Scanner</li>
                </ol>
            </nav>
        </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6">

    <div class="card">
   <div class="card-body">
    
   <button type="button" class="close btn btn-danger" aria-label="Close" id="resetButton" style="margin-bottom:-10px; padding:6px;  border-radius:70%;">
  <span aria-hidden="true">&times;</span>
</button>
    <div>
        <video id="video" width="415" height="250" style="border: 1px solid gray; " >
        </video>
    </div>


    <div id="sourceSelectPanel" style="display:none">
        <select class="select2-example" id="sourceSelect" id="kelurahan">
        <option disabled selected="true" >Select Camera</option>
        </select>
    </div>

    <div>
       
    <br>
    <center>
       <button type="button" class="btn btn-outline-success" id="startButton" style="padding-left:20px; padding-right:20px">Start Scanning</button>

    </center>
      
   </div>
   
    
</div>
</div>

    </div>
    <div class="col-md-6 col-sm-6">
    <div class="card">
    <div class="card-body">

    <label>Barcode Scanning : </label>
   <code id="result"></code>
    </div>
    </div>

   
    <div class="tabel" id="tabel"></div>

        
        

    </div>
</div>

<script>
   $('.select2-example').select2({
        placeholder: 'Select'
        });
</script>

@endsection

@section('script')
<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
     
    Webcam.set({
        flip_horiz: true
    });
    Webcam.attach('#video');

      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text;
                document.getElementById('result').value = result.text;
                data_barcode();
                tampil_toast();
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            $("#data_tabel").remove();
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })

    function data_barcode(){
        
        console.log('masuk data_barcode');
        var hasil= document.getElementById('result').value;
        console.log('tampil variable hasil');
        console.log(hasil);
                    jQuery.ajax({
                     url : 'data-barcode/' +hasil,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                       if(data.length==0){
                        console.log('masuk if');
                         alert('data-kosong');
                         
                       }
                       else{
                         console.log('masuk else');
                        console.log(data);
                        jQuery.each(data, function(key,value){
                           console.log('masuk jquery eachhh');
                          var append_html =  '\<div class="data_tabel" id="data_tabel">\
                                              <div class="card">\
                                              <div class="card-body">\
                                              <div class="table-responsive">\
                                              <table class="table ">\
                                                <thead>\
                                                <tr>\
                                                <th colspan="2" style="font-size:13px";> Details Products</th>\
                                                </tr>\
                                                </thead>\
                                                <tbody>\
                                                <tr>\
                                                <td> <strong> ID  <strong></td>\
                                                <td>'+value.id_barang+'</td>\
                                                </tr>\
                                                <tr>\
                                                <td><strong>Nama </strong></td>\
                                                <td>'+value.nama_barang+'</td>\
                                                </tr>\
                                                <tr>\
                                                <td><strong>Deksripsi <strong> </td>\
                                                <td class="text-wrap" style="text-align:justify" >'+value.deskripsi_barang+'</td>\
                                                </tr>\
                                                </tbody>\
                                              </table>\
                                            </div>\
                                            </div>\
                                            </div>\
                                            </div>';
                            $("#tabel").append(append_html);
                        }); 
                        
                       }
                     }
                  });
    }

   

    function tampil_toast(){
        console.log('masuk toast function');
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
        toastr.success('Barcode was successfully scanned!');   
    }
  </script>
@endsection