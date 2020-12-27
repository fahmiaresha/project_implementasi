@include('sse::view')
<script>
var es = new EventSource("{{route('sse')}}");

es.addEventListener("onclick", function (e) {
    var data = JSON.parse(e.data);
    alert(data.message);
}, false);

</script>