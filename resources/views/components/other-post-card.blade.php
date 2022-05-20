@props(['otherPost'])

<article
    {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
    @auth
        @if(auth()->user()->id === $otherPost->user->id)
            <x-hoverableDrop :id="$otherPost->id" type="post" />
        @endif
    @endauth
    <div class="py-6 px-5">
        <div>
            <img src="{{asset('storage/'.$otherPost->thumbnail)}}" style="width: 100%; height: 300px" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <x-category-button :post="$otherPost" />
                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$otherPost->title}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$otherPost->created_at->diffForHumans()}}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p class="mt-4">
                    {{$otherPost->excerpt}}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{asset('/storage/'.$otherPost->user->thumbnail)}}" alt="Lary avatar" class="rounded-xl" width="65px" height="100px">
                    <div class="ml-3">
                        <h5 class="font-bold"><a href="/?user={{$otherPost->user->name}}">{{$otherPost->user->name}}</a></h5>
                    </div>
                </div>

                <div>
                    <a href="/post/{{str_replace(' ','-',$otherPost->title)}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>

