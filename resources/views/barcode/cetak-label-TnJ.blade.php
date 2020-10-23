@extends('layouts.app')
@section('title','Cetak Label TnJ 108')
@section('head')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
    <style>
    </style>
@endsection

@section('content')

    <div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Cetak Label TnJ 108</h3>
            <nav aria-label="breadcrumb" class="d-flex align-items-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a href="#">Barang</a>
                    </li> -->
                    <li class="breadcrumb-item active" aria-current="page">Cetak Label TnJ 108</li>
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
                        <th>Deksripsi</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($barang as $b)
                    <tr>
                    <td>{{$b->id_barang}}</td>
                    <td>{{$b->nama_barang}}</td>
                    <td class="text-wrap" style="text-align:justify">{{$b->deskripsi_barang}}</td>
                    <th><a href="pdf-barcode/{{$b->id_barang}}"><button type="button" class="btn btn-outline-info" onclick="alert()">Cetak Barcode</button></a></th>
                    
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
    $(document).ready(function() {
    $('#myTable').DataTable( {
        retrieve: true,
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

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
    <!-- Datatable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
  
    <script src="{{ url('assets/js/examples/pages/user-list.js') }}"></script>
@endsection
