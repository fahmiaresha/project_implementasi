@extends('layouts.app')
@section('title','Geolocation')
@section('content')



<div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Tambah Data Toko </h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Kunjungan Toko</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Input Titik Awal</li>
                </ol>
            </nav>
        </div>
    </div>

    
 
    <div class="card">
        <div class="card-body">

        <!-- <p id="koordinate"></p> -->
		<form method="post" action="{{ url('/input-geolocation/store') }}">

		@csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" name ="nama" id="nama" placeholder="Nama Toko" >
           
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Alamat</label>
            <input type="text" class="form-control" name ="alamat" id="alamat" placeholder="Alamat Lengkap" >
           
        </div>

		<div class="form-row">
                    <div class="col-md-4 mb-4">
                    <label for="validationCustom03">Latitude</label>
                    <input type="text" class="form-control" name ="latitude" id="latitude" placeholder="Latitude" readonly >

                    </div>

                    <div class="col-md-4 mb-4">
                    <label for="validationCustom03">Longitude</label>
					<input type="text" class="form-control" name ="longitude" id="longitude" placeholder="Longitude" readonly>
                   
                    </div>
                    <div class="col-md-4 mb-4">
                    <label for="validationCustom04">Accuracy</label>
					<input type="text" class="form-control" name ="accuracy" id="accuracy" placeholder="Accuracy" readonly>
                   
                    </div>
                  
                </div>
	
		
		
		<!-- .modal-xl -->
		<div class="modal fade" id="modal-maps" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Lokasi Toko</h6>
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

        <button  class="btn btn-outline-primary mb-2" type="button" onclick="getlocation();">Geolocation</button> 
		 <button type="submit" class="btn btn-outline-success mb-2 ml-1">Submit Data</button>
        </div>
    </div>
	</form>
@endsection



@section('script')
<!-- <script src="https://maps.google.com/maps/api/js?sensor=false"></script>  -->
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAznbmf9fxvDrf8Fnv8MPq09mQN5NVXtZk&callback=&libraries=&v=weekly"
      defer
    ></script>

<script>

var watchID;
var geoLoc;

var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var akurasi = document.getElementById("accuracy");
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
			latitude.value = latt;
			longitude.value = long
			akurasi.value = accuracy;

			 var hasil = "Latitude: " + latt + "\n Longitude: " + long + "\n Accuracy: "+accuracy;
			swal("Lokasi Di Temukan ",hasil, "success");
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

		function getLocationUpdate(){
            if(navigator.geolocation){
               var options = {timeout:60000};
               geoLoc = navigator.geolocation;
               watchID = geoLoc.watchPosition(showLoc, errHand);
            } else {
               alert("Sorry, browser does not support geolocation!");
            }
         }

		 

</script>

@if (session('insert'))
<script>
swal("Success!","Data Toko Berhasil Di Tambahkan","success");
</script>
@endif

@endsection