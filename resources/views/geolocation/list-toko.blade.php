@extends('layouts.app')
@section('title','List Toko')
@section('head')
 <!-- Datatable -->
 <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('content')
<div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>List Toko</h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Kunjungan Toko</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List Toko</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nama Toko</th>
                        <th class="text-wrap" style="text-align:justify">Alamat Toko</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Accuracy</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($lokasi_toko as $lk)
                    <tr>

                    <td>{{$lk->id_barcode}}</td>
                    <td>{{$lk->nama_toko}}</td>
                    <td>{{$lk->alamat_toko}}</td>
                    <td>{{$lk->latitude}}</td>
                    <td>{{$lk->longitude}}</td>
                    <td>{{$lk->accuracy}}</td>
                    <td><a href="toko-barcode/{{$lk->id_barcode}}"><button type="button" class="btn btn-outline-info" onclick="alert()">Cetak Barcode</button></a></td>
                    </tr>
                    @endforeach
                
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>

$(document).ready(function (){
    $('#myTable').DataTable();
});

function alert(){
        console.log('masuk alert function');
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
        toastr.info('Please wait . . . . .');       
    }

</script>

</script>
    <!-- Datatable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
  
    <script src="{{ url('assets/js/examples/pages/user-list.js') }}"></script>

@endsection