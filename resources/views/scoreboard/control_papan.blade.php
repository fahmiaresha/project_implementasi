@extends('layouts.app')
@section('title','Kontrol Scoreboard')
@section('head')   
@endsection

@section('content')
        
    
    
<h5>Pertandingan</h5>
<div class="form-row mt-3">

                    <div class="col-md-4 mb-3">
                    <form action="/store-home" method="POST">
                    <label for="validationCustom03">Home</label>
                    <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Masukkan Home" >
                    </div>

                    <div class="col-md-2 mb-3" style="margin-top:4px;">
                    <button type="submit" class="btn btn-outline-success mt-4" >Submit</button>
                    </form>
                    </div>

                    <div class="col-md-4 mb-3">
                    <form action="/store-away" method="POST">
                    <label for="validationCustom03">Home</label>
                    <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Masukkan Away" >
                    </div>

                    <div class="col-md-2 mb-3" style="margin-top:4px;">
                    <button type="submit" class="btn btn-outline-success mt-4" >Submit</button>
                    </form>
                    </div>
                   
</div>
<h5>Score</h5>
<div class="form-row mt-3">

    <div class="col-md-5">
        <label for="validationCustom03">Home</label>
        <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Skor saat ini..."  readonly>

                   

    </div>

    <div class="col-md-1"></div>

    <div class="col-md-5">
        <label for="validationCustom03">Away</label>
        <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Skor saat ini..."  readonly>

                   

    </div>



</div>

<center>

<div class="form-row mt-3">
    <div class="col-md-2">
        <form action="/store-scorehome" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="homeplus2">+ 2 Home</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-scorehome" method="POST">
            <button type="submit" class="btn btn-outline-danger" name="homeminus2">- 2 Home</button>
        </form>
    </div>
    <div class="col-md-2">
    </div>

    <div class="col-md-2">
        <form action="/store-scoreaway" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="awayplus2">+ 2 Away</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-scoreaway" method="POST">
            <button type="submit" class="btn btn-outline-danger" name="awayminus2">- 2 Away</button>
        </form>
    </div>
</div>
</center>

<center>
<div class="form-row mt-3">
    <div class="col-md-2">
        <form action="/store-scorehome" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="homeplus3">+ 3 Home</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-scorehome" method="POST">
            <button type="submit" class="btn btn-outline-danger" name="homeminus2">- 3 Home</button>
        </form>
    </div>

    <div class="col-md-2">
    </div>

    <div class="col-md-2">
        <form action="/store-scoreaway" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="awayplus3">+ 3 Away</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-scoreaway" method="POST">
            <button type="submit" class="btn btn-outline-danger" name="awayminus3">- 3 Away</button>
        </form>
    </div>
</div>
</center>

<div class="form-row">
<div class="col-md-6">
<h5 class="mt-4">Timer</h5>
</div>
<div class="col-md-6">
<h5 class="mt-4">Sound</h5>

</div>
</div>

<center>
<div class="form-row mt-3">
    <div class="col-md-2">
        <form action="/store-start-timer" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="homeplus3">Start Timer</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-resume-timer" method="POST">
            <button type="submit" class="btn btn-outline-warning" name="homeminus2">Resume Timer</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-stop-timer" method="POST">
            <button type="submit" class="btn btn-outline-danger" name="homeminus2">Stop Timer</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-music" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="homeminus2">Sound 1</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-music" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="homeminus2">Sound 2</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-music" method="POST">
            <button type="submit" class="btn btn-outline-primary" name="homeminus2">Sound 3</button>
        </form>
    </div>
    
</div>
</center>



@endsection

@section('script')
@endsection