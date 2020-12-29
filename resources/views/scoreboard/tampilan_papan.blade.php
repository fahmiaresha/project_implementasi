@extends('layouts.app')
@section('title','Tampilan Scoreboard')
@section('head') 
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<audio id="audio1">
 <source src="{{ asset('asset/lagu/sound1.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>



<center>
<div class="form-row">
    <div class="col md-4" id="name_home">a</div>
    <div class="col md-4" id="name_away">b</div>
</div>

<div class="form-row mt-4">
    <div class="col md-4" id="score_home">0</div>
    <div class="col md-4" id="score_away">0</div>
</div>
</center>

@endsection

@section('script')
<script>
window.onload = function() {
    var sse = new EventSource("<?php echo action('ScoreboardController@update_sse'); ?>");
      sse.onmessage = function(e) {
          console.log(e);
          var data_json = JSON.parse(e.data);
        //   console.log(data_json);
        //   console.log(data_json[0].musik);
          document.getElementById("name_home").innerHTML=data_json[0].name_home;
          document.getElementById("name_away").innerHTML=data_json[0].name_away;
          document.getElementById("score_home").innerHTML=data_json[0].score_home;
          document.getElementById("score_away").innerHTML=data_json[0].score_away;

          if(data_json[0].musik==1){
            var audio1 = document.getElementById("audio1");
            audio1.play();
          }

          if(data_json[0].musik==2){
            var audio2 = document.getElementById("audio2");
            audio2.play();
          }

          if(data_json[0].musik==3){
            var audio3 = document.getElementById("audio3");
            audio3.play();
          }

        //   update_sound();

          


        //   tutup-sse
      }
}

function update_sound(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var url = '{{ url('update-sound') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
                });
        }
</script>


@endsection

