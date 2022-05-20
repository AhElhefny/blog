@props(['c'])
<div>
    @auth
        @if(auth()->user()->id == $c->user->id)
            <x-hoverableDrop :id="$c->id" style="left: -30px;" type="comment"/>
        @endif
    @endauth
<article class="flex bg-gray-100 border border-gray-200 p-6 mt-7 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="{{asset('/storage/'.$c->user->thumbnail)}}" width="60" height="60" class="rounded-xl" alt="">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$c->user->name}}</h3>
            <p class="text-xs">
                Posted
                <time>{{$c->created_at->diffForHumans()}}</time>
            </p>
        </header>
        <p>
            {{$c->body}}
        </p>
    </div>
</article>
</div>
