<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @auth
            <x-store-post />
        @endauth


        @if($posts->count())
           <x-post-grid :posts="$posts"  />
            {!! $posts->links() !!}
        @else
        <p class="text-center">No posts yet. please check back later</p>
        @endif
    </main>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token]").val()
            }
        });
        $("#createPost").submit(function (e){
            e.preventDefault();
            console.log('asssaa');
            var F=new FormData();
            var thumbnail=document.getElementById('thumbnail');

            let _token=$("input[name=_token]").val();
            let title=$("#title").val();
            let category=$("#cat").val();
            let excerpt=$("#excerpt").val();
            let body=$("#body").val();

            F.append('excerpt',excerpt);
            F.append('thumbnail',thumbnail.files[0]);
            F.append('category_id',category);
            F.append('title',title);
            F.append('body',body);
            F.append('_token',_token);

            $.ajax({
            url:"{{route('storePost')}}",
            type:"POST",
            data:F,
            contentType    : false,
            processData : false,
            success:function (response){
                if(response){
                    $("#posttable tbody").prepend('<tr><td>'+ response.title + '</td><td>'+ response.body +'</td></tr>');
                    $("#createPost")[0].reset();
                }
            }

        });
        });
    </script>
</x-layout>
