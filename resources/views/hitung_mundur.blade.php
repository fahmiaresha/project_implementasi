@extends('layouts.app')
@section('title','hitung mundur')
@section('head') 
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="coba">
    <span id="timer"></span>
</div>



@endsection


@section('script')
<script>
       var menit;
    var detik;
window.onload = function() {

    document.getElementById('timer').innerHTML =
    003 + ":" + 20;
    startTimer();
    function startTimer() {
    console.log('masuk startimer');
        var presentTime = document.getElementById('timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if(s==59){m=m-1}
        if(m<0){
            console.log('timer completed');
        }
        else{
            document.getElementById('timer').innerHTML =
            m + ":" + s;
            menit = m;
            detik = s;
            insert_menit_detik();
            console.log(m);
            console.log(s);
            setTimeout(startTimer, 1000);
        }
    }

function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
}


}

function insert_menit_detik(){
              // console.log(menit);
              // console.log(detik);
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var url = '{{ url('update-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              name_menit:menit, 
              name_detik:detik, 
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