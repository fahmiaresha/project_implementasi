<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode-Toko-{{$id_toko}}</title>
</head>
<body>

@foreach($toko as $t)
<center>
<img src="data:image/png;base64,{{DNS2D::getBarcodePNG($id_toko, 'QRCODE')}}" width="330px" height="330px">
</center>
    <br>
<center>
<font size="5"><strong>{{$t->id_barcode}}</strong></font>
    <br>

<font size="5"><strong>{{$t->nama_toko}}</strong></font>
</center>
@endforeach


</body>
</html>