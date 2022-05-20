@props(['header'])
@csrf
<header class="flex items-center mb-7">
    <img src="{{asset('/storage/'.auth()->user()->thumbnail)}}" alt=""
         width="40" height="40" class="rounded-full">
    <h2 class="ml-4">{{$header}}</h2>
</header>
