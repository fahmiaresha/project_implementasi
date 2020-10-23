@extends('layouts.app')
@section('title','Titik Kunjungan')
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
            <h3>Titik Kunjungan</h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Kunjungan Toko</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Titik Kunjungan</li>
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
    
    <code id="result" type="hidden"></code>
   
    <div class="tabel" id="tabel"></div>

    
        

    </div>
</div>

	<!-- .modal-xl -->
  <div class="modal fade" id="modal-maps" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Lokasi Anda</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="ti-close"></i>
				</button>
			</div>
			<div class="modal-body">

			<div id="demo2" style="height: 400px; position: relative; overflow: hidden; border: 1px solid gray;"> </div> 
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Close
				</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
			</div>
		</div>
		</div>

<script>
   $('.select2-example').select2({
        placeholder: 'Select'
        });
</script>
@endsection

@section('script')
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAznbmf9fxvDrf8Fnv8MPq09mQN5NVXtZk&callback=&libraries=&v=weekly"
      defer
    ></script>
<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">

  var longitude_toko;
  var latitude_toko;
  var accuracy_toko;

  var longitude_sales;
  var latitude_sales;
  var accuracy_sales;

  var jarak;
  var result_acc;

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
                // document.getElementById('result').textContent = result.text;
                document.getElementById('result').value = result.text;
                console.log('hasil scan barcode / qrcode :')
                console.log(result.text);
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
        
        // console.log('masuk data-qr-code');
        var hasil= document.getElementById('result').value;
        // console.log('tampil variable hasil');
        // console.log(hasil);
                    jQuery.ajax({
                     url : 'data-qr-code/' +hasil,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery.each(data, function(key,value){
                           
                          // var append_html = '\<div class="data_tabel" id="data_tabel">\
                          //                     <div class="card">\
                          //                     <div class="card-body">\
                          //                     <div class="table-responsive">\
                          //                     <table class="table ">\
                          //                       <thead>\
                          //                       <tr>\
                          //                       <th colspan="2" style="font-size:13px;"> Details Toko</th>\
                          //                       </tr>\
                          //                       </thead>\
                          //                       <tbody>\
                          //                       <tr>\
                          //                       <td> <strong> ID  <strong></td>\
                          //                       <td>'+value.id_barcode+'</td>\
                          //                       </tr>\
                          //                       <tr>\
                          //                       <td><strong> Alamat </strong></td>\
                          //                       <td>'+value.alamat_toko+'</td>\
                          //                       </tr>\
                          //                       <tr>\
                          //                       <td><strong>Latitude <strong> </td>\
                          //                       <td class="text-wrap" style="text-align:justify" >'+value.latitude+'</td>\
                          //                       </tr>\
                          //                       <tr>\
                          //                       <td><strong>Longitude <strong> </td>\
                          //                       <td class="text-wrap" style="text-align:justify" >'+value.longitude+'</td>\
                          //                       </tr>\
                          //                       <tr>\
                          //                       <td><strong>Accuracy <strong> </td>\
                          //                       <td class="text-wrap" style="text-align:justify" >'+value.accuracy+'</td>\
                          //                       </tr>\
                          //                       </tbody>\
                          //                     </table>\
                          //                   </div>\
                          //                   </div>\
                          //                   </div>\
                          //                   </div>';
                                            longitude_toko = value.longitude;
                                            latitude_toko = value.latitude;
                                            accuracy_toko = value.accuracy;

                                            console.log('Informasi Toko :');
                                            console.log(latitude_toko);
                                            console.log(longitude_toko);
                                            
                                            console.log(accuracy_toko);
                                            
                            // $("#tabel").append(append_html);
                        }); 
                        getlocation();
                     }
                  });
    }

    function getlocation(){ 
			if(navigator.geolocation){ 
				navigator.geolocation.getCurrentPosition(showLoc, errHand); 
				
			} 
		} 

		function showLoc(pos){ 
			latt = pos.coords.latitude; 
			long = pos.coords.longitude; 
			var accuracy = pos.coords.accuracy;
            // x.innerHTML = "Latitude: " + latt + "<br>Longitude: " + long;
			// latitude.value = latt;
			// longitude.value = long
			// akurasi.value = accuracy;

       longitude_sales = long;
       latitude_sales = latt;
       accuracy_sales = accuracy;

       console.log('Informasi Sales :');
        console.log(latitude_sales);
       console.log(longitude_sales);
         console.log(accuracy_sales);

			//  var hasil = "Latitude: " + latt + "\n Longitude: " + long + "\n Accuracy: "+accuracy;
      //  console.log(hasil);
			// swal("Lokasi Di Temukan ",hasil, "success");
			var lattlong = new google.maps.LatLng(latt, long); 
			var OPTions = { 
				center: lattlong, 
				zoom: 10, 
				mapTypeControl: true, 
				navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL} 
			} 
			var mapg = new google.maps.Map(document.getElementById("demo2"), OPTions); 
			$('#modal-maps').modal('show');
			var markerg = 
			new google.maps.Marker({position:lattlong, map:mapg, title:"You are here!"}); 

      jarak = getDistanceFromLatLonInKm(latitude_toko,longitude_toko,latitude_sales,longitude_sales);
      console.log('jarak');
      console.log(jarak);
      rata_accuracy();
      kesimpulan();
		} 

		
		
		function errHand(err) { 
			switch(err.code) { 
				case err.PERMISSION_DENIED: 
					result.innerHTML = "The application doesn't have the permission" + 
							"to make use of location services" 
					break; 
				case err.POSITION_UNAVAILABLE: 
					result.innerHTML = "The location of the device is uncertain" 
					break; 
				case err.TIMEOUT: 
					result.innerHTML = "The request to get user location timed out" 
					break; 
				case err.UNKNOWN_ERROR: 
					result.innerHTML = "Time to fetch location information exceeded"+ 
					"the maximum timeout interval" 
					break; 
			} 
		} 

    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2-lat1); // deg2rad below
    var dLon = deg2rad(lon2-lon1);
    var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ;
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c * 1000; // Distance in m
    return d;
    }
    
    function deg2rad(deg) {
    return deg * (Math.PI/180)
    }

    function rata_accuracy(){
      var hassil = accuracy_toko+accuracy_sales;
      result_acc = hassil/2;
       console.log("rata-rata akurasi : ");
       console.log(result_acc);
    }

    function kesimpulan(){
        if(jarak<=result_acc){
          swal("Success ","Anda berada di toko", "success");
        }
        else{
          swal("Maaf! ","Anda tidak berada di toko", "error");
        }
    }

    function tampil_toast(){
        // console.log('masuk toast function');
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