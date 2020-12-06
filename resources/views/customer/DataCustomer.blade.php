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


        <!-- .modal-lg -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal_eror">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Excel</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-danger alert-dismissible" role="alert">
          <i class="fa fa-warning"></i> Sorry , please check your excel file !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <i class="ti-close"></i>
                                </button>
                               </div>
            @if(session()->has('failures'))
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Row</th>
                                <th>Attribute</th>
                                <th>Value</th>
                                <th>Errors</th>
                                
                            </tr>
                            @foreach (session()->get('failures') as $validation)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $validation->row() }}</td>
                                    <td>{{ $validation->attribute() }}</td>
                                    <td>
                                        {{ $validation->values()[$validation->attribute()] }}
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($validation->errors() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </table>
                    @endif
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="modal_eror1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import errors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- <div class="alert alert-danger alert-dismissible" role="alert">
          <i class="fa fa-warning"></i> Sorry , please check your file !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <i class="ti-close"></i>
                                </button>
            </div> -->
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
        </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
          
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal"  data-target="#coba">
            <i class="fa fa-plus-circle mr-2"></i>Data Customer</button>
            <div class="modal fade" tabindex="-1" role="dialog" id="coba">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif -->


                  

                <form method="post" action="{{ url('/customer-excel-store') }}" enctype="multipart/form-data">
                    @csrf

                        <label for="Nama" >File</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" required>
                            <label class="custom-file-label" for="customFile" >Choose file</label>
                        </div>
                        
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                    </form>
                </div>
                </div>
            </div>
            </div>

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
                    <td>{{$c->id_customer}}</td>
                    <td>{{$c->NAMA}}</td>
                    <td>{{$c->ALAMAT}}</td>
                    @if($c->FOTO!=null)
                    <td>
                    {{$c->FOTO}}
                    </td>
                    @endif
                    @if($c->FILE_PATH!=null)
                        <td class="image-popup" href="{{ url($c->FILE_PATH) }}" >
                        <center>
                        <img src="{{ url($c->FILE_PATH) }}" alt="" title="" style="cursor: pointer;">
                        </center>
                        </td>
                    @else
                    <td> <center>- </center></td>
                    
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

@if (session('excel_eror'))
<script>
swal("Oops!","Please check your excel file","error");
</script>
@endif

@if (session('excel_success'))
<script>
swal("Success!","Data excel berhasil ditambahkan!","success");
</script>
@endif

@if(session()->has('failures'))
<script>
$('#modal_eror').modal('show');
</script>
@endif

@if (isset($errors) && $errors->any())
<script>
$('#modal_eror1').modal('show');
</script>
@endif
@endsection
