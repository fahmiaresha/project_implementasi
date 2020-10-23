<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode-{{$barang_id}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

@php
for ($x = 1; $x <= 8; $x++) { @endphp
      <div class="Row" >
      <div class="Column">
       <div class="coba" style="height: 68.031496px; width:143.622047px; " > 
        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('$barang_id', 'C128')}}" style="height: 26.456693px; width:128.503937px; margin-left:2mm; margin-top:1.5mm" alt="barcode" />
            
            <div class="coba1" style="margin-top:-5px;">
            <center>
            <font size="2"><strong>{{$barang_id}}</strong></font>
            </div>
            </center>

            <div class="coba2" style="margin-top:-10px;">
                @foreach($barang as $b)
                <center>
                <font size="2"> {{$b->nama_barang}} </font>
                </center>
                @endforeach
            </div>
       </div>
       </div>

       <div class="Column">
       <div class="coba" style="height: 68.031496px; width:143.622047px;    " > 
        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('$barang_id', 'C128')}}" style="height: 26.456693px; width:128.503937px; margin-left:2mm; margin-top:1.5mm" alt="barcode" />
            
            <div class="coba1" style="margin-top:-5px;">
            <center>
            <font size="2"><strong>{{$barang_id}}</strong></font>
            </div>
            </center>
            <div class="coba2" style="margin-top:-10px;">
           
                @foreach($barang as $b)
                <center>
                <font size="2"> {{$b->nama_barang}} </font>
                </center>
                @endforeach
          
            </div>
       </div>
       </div>

       <div class="Column">
       <div class="coba" style="height: 68.031496px; width:143.622047px; "> 
        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('$barang_id', 'C128')}}" style="height: 26.456693px; width:128.503937px; margin-left:2mm; margin-top:1.5mm" alt="barcode" />
            
            <div class="coba1" style="margin-top:-5px;">
            <center>
            <font size="2"><strong>{{$barang_id}}</strong></font>
            </div>
            </center>
            <div class="coba2" style="margin-top:-10px;">
           
                @foreach($barang as $b)
                <center>
                <font size="2"> {{$b->nama_barang}} </font>
                </center>
                @endforeach
                
            </div>
       </div>
       </div>

       <div class="Column">
       <div class="coba" style="height: 68.031496px; width:143.622047px; "> 
        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('$barang_id', 'C128')}}" style="height: 26.456693px; width:128.503937px; margin-left:2mm; margin-top:1.5mm" alt="barcode" />
            
            <div class="coba1" style="margin-top:-5px;">
            <center>
            <font size="2"><strong>{{$barang_id}}</strong></font>
            </div>
            </center>
            <div class="coba2" style="margin-top:-10px;">
                @foreach($barang as $b)
                <center>
                <font size="2"> {{$b->nama_barang}} </font>
                </center>
                @endforeach
            </div>
       </div>
       </div>

       <div class="Column">
       <div class="coba" style="height: 68.031496px; width:143.622047px; ">
         
         <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('$barang_id', 'C128')}}" style="height: 26.456693px; width:128.503937px; margin-left:2mm; margin-top:1.5mm" alt="barcode" />
          
          <div class="coba1" style="margin-top:-5px;">
          <center>
            <font size="2"><strong>{{$barang_id}}</strong></font>
          </div>
          </center>
          <div class="coba2" style="margin-top:-10px;">
              @foreach($barang as $b)
              <center>
              <font size="2"> {{$b->nama_barang}} </font>
              </center>
              @endforeach
          </div>
         </div>
         </div>
    </div> 
    @php } @endphp

<style>
.Row {
    display:table;
    width: 100%;    
    border-spacing: 3mm 1.2mm ; 
    border-collapse: separate;
    margin-left:-20px;
    /* margin-left:-33px; */
}
.Column {
    display: table-cell;
}
body{
    margin-top:-39px;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>