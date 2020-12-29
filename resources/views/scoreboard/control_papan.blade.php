@extends('layouts.app')
@section('title','Kontrol Scoreboard')
@section('head') 
<meta name="csrf-token" content="{{ csrf_token() }}">  
@endsection

@section('content')

<h5>Pertandingan</h5>
<div class="form-row mt-3">

                    <div class="col-md-4 mb-3">

                    <form action=""  method="POST">
                        <label for="validationCustom03">Home</label>
                        <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Masukkan Home" >
                        </div>

                        <div class="col-md-2 mb-3" style="margin-top:4px;">
                        <button type="button" class="btn btn-outline-success mt-4 btn-submit-home">Submit</button>
                        </form>
                        </div>
                    

                    <div class="col-md-4 mb-3">
                    <form action="" method="POST">
                    <label for="validationCustom03">Away</label>
                    <input type="text" class="form-control" name ="nama_away" id="nama" placeholder="Masukkan Away" >
                    </div>

                    <div class="col-md-2 mb-3" style="margin-top:4px;">
                    <button type="submit" class="btn btn-outline-success mt-4 btn-submit-away"  >Submit</button>
                    </form>
                    </div>
                   
</div>
<h5>Score</h5>
<div class="form-row mt-3">

    <div class="col-md-5">
        <label for="validationCustom03">Home</label>
        <input type="text" class="form-control" name ="score_home" id="skor_home_saat_ini" placeholder="Skor saat ini..."  readonly>

                   

    </div>

    <div class="col-md-1"></div>

    <div class="col-md-5">
        <label for="validationCustom03">Away</label>
        <input type="text" class="form-control" name ="score_away" id="skor_away_saat_ini" placeholder="Skor saat ini..."  readonly>

                   

    </div>



</div>

<center>

<div class="form-row mt-3">
    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-homeplus2" name="homeplus2">+ 2 Home</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-danger btn-submit-homeminus2" name="homeminus2">- 2 Home</button>
        </form>
    </div>
    <div class="col-md-2">
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-awayplus2" name="awayplus2">+ 2 Away</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-danger btn-submit-awayminus2" name="awayminus2">- 2 Away</button>
        </form>
    </div>
</div>
</center>

<center>
<div class="form-row mt-3">
    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-homeplus3" name="homeplus3">+ 3 Home</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-danger btn-submit-homeminus3" name="homeminus2">- 3 Home</button>
        </form>
    </div>

    <div class="col-md-2">
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-awayplus3" name="awayplus3">+ 3 Away</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-danger btn-submit-awayminus3" name="awayminus3">- 3 Away</button>
        </form>
    </div>
</div>
</center>

<div class="form-row">
<div class="col-md-6">
<h5 class="mt-4">Timer</h5>
</div>
<div class="col-md-6">
<h5 class="mt-4">Music</h5>

</div>
</div>

<center>
<div class="form-row mt-3">
    <div class="col-md-2">
        <form action="/store-start-timer" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-start-timer" name="start_timer">Start Timer</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-resume-timer" method="POST">
            <button type="submit" class="btn btn-outline-warning btn-submit-resume-timer" name="resume_timer">Resume Timer</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="/store-stop-timer" method="POST">
            <button type="submit" class="btn btn-outline-danger btn-submit-stop-timer" name="stop_timer">Stop Timer</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-sound1" name="homeminus2">Sound 1</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-sound2" name="homeminus2">Sound 2</button>
        </form>
    </div>

    <div class="col-md-2">
        <form action="" method="POST">
            <button type="submit" class="btn btn-outline-primary btn-submit-sound3" name="homeminus2">Sound 3</button>
        </form>
    </div>
    
</div>
</center>

</form>


@endsection

@section('script')
<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-home").click(function(e){
        e.preventDefault();

        var home = $("input[name=nama_home]").val();
        var url = '{{ url('store-home') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  name_home:home, 
                },
           success:function(response){
              if(response.success){
                  alert(response.message) 
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-away").click(function(e){
        e.preventDefault();

        var away = $("input[name=nama_away]").val();
        var url = '{{ url('store-away') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  name_away:away, 
                },
           success:function(response){
              if(response.success){
                  alert(response.message) 
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-homeplus2").click(function(e){
        console.log('masukplus2home');
        e.preventDefault();

        var homeplus2 = $("input[name=homeplus2]").val();
        var url = '{{ url('store-homeplus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_home_saat_ini();
                skor_away_saat_ini();
                  alert(response.message);
                  
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
    
    function skor_home_saat_ini(){
        console.log('masuk skor_home_saat_ini');
                    jQuery.ajax({
                     url : 'get-score',
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery.each(data, function(key,value){
                            console.log('masuk jquery each');
                            document.getElementById("skor_home_saat_ini").value = value.score_home;
                        }); 
                     }
                  });
    }

    function skor_away_saat_ini(){
        console.log('masuk skor_away_saat_ini');
                    jQuery.ajax({
                     url : 'get-score',
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery.each(data, function(key,value){
                            console.log('masuk jquery each');
                            document.getElementById("skor_away_saat_ini").value = value.score_away;
                        }); 
                     }
                  });
    }
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-homeminus2").click(function(e){
        console.log('masukminus2home');
        e.preventDefault();

        var url = '{{ url('store-homeminus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_home_saat_ini();
                skor_away_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-homeplus3").click(function(e){
        console.log('masukhomeplus3');
        e.preventDefault();

        var url = '{{ url('store-homeplus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_home_saat_ini();
                skor_away_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-homeminus3").click(function(e){
        console.log('masukhomeminus3');
        e.preventDefault();

        var url = '{{ url('store-homeminus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_home_saat_ini();
                skor_away_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>



<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-awayplus2").click(function(e){
        console.log('masukawayplus2');
        e.preventDefault();

        var url = '{{ url('store-awayplus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_away_saat_ini();
                skor_home_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-awayplus3").click(function(e){
        console.log('awayplus3');
        e.preventDefault();

        var url = '{{ url('store-awayplus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_away_saat_ini();
                skor_home_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-awayminus3").click(function(e){
        console.log('awayminus3');
        e.preventDefault();

        var url = '{{ url('store-awayminus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_away_saat_ini();
                skor_home_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-awayminus2").click(function(e){
        console.log('awayminus2');
        e.preventDefault();

        var url = '{{ url('store-awayminus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                skor_away_saat_ini();
                skor_home_saat_ini();
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>


<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-sound1").click(function(e){
        console.log('sound1');
        e.preventDefault();

        var url = '{{ url('store-sound1') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-sound2").click(function(e){
        console.log('sound2');
        e.preventDefault();

        var url = '{{ url('store-sound2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-sound3").click(function(e){
        console.log('sound3');
        e.preventDefault();

        var url = '{{ url('store-sound3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-start-timer").click(function(e){
        console.log('start-timer');
        e.preventDefault();

        var url = '{{ url('reset-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-resume-timer").click(function(e){
        console.log('resume-timer');
        e.preventDefault();

        var url = '{{ url('resume-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit-stop-timer").click(function(e){
        console.log('stop-timer');
        e.preventDefault();

        var url = '{{ url('stop-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  alert(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

@endsection