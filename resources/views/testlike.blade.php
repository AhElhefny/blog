<x-layout >
    <div>
        <button id="btnadd">add like</button>
    </div>
    <div id="count">{{$count}}</div>
    <div id="zed">

    </div>
    <input type="text" id="oldCountInput" value="{{$count}}">

    <script>
        $("#btnadd").click(function (){
           $.ajax({
               url:"{{route('addone')}}",
               type:"GET",
               data:{'oldCount':$("#oldCountInput").val()},
              success:function (response){
                   if(response){
                       $("#count").hide();
                       $("#oldCountInput").val(response['count']);
                       $("#zed").html(`<p>`+ response['count'] + `</p>`);
                   }
              }
           });

        });
    </script>
</x-layout>
