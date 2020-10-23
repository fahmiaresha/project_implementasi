@extends('layouts.app')
@section('title','Data Customer')
@section('head')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

    <!-- Css -->
    <link rel="stylesheet" href="vendors/lightbox/magnific-popup.css" type="text/css">

   
@endsection

@section('content')

    <div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Customer</h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Customer</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Customer</li>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Kelurahan</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($customer as $c)
                   
                    <tr>
                    <td>{{$c->ID_CUSTOMER}}</td>
                    <td>{{$c->NAMA}}</td>
                    <td>{{$c->ALAMAT}}</td>
                    @if($c->FOTO!=null)
                    <td>{{$c->FOTO}}</td>
                    @else
                        <td class="image-popup" href="{{ url($c->FILE_PATH) }}" >
                        <center>
                        <img src="{{ url($c->FILE_PATH) }}" alt="" title="" style="cursor: pointer;">
                        </center>
                        </td>
                    @endif
                  
                   
                    <td>{{$c->ID_KELURAHAN}}</td>
                    </tr>

                   
                    @endforeach
                
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

@section('script')
 <!-- Javascript -->
 <script src="vendors/lightbox/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function (){
    $('#myTable').DataTable();


$('.image-popup').magnificPopup({
    type: 'image',
    zoom: {
        enabled: true,
        duration: 300,
        easing: 'ease-in-out',
        opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
    }
});

});
</script>
    <!-- Datatable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
  
    <script src="{{ url('assets/js/examples/pages/user-list.js') }}"></script>
@endsection
