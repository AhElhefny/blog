@props(['post'])
<div>
    @auth
        @if(auth()->user()->id === $post->user->id)
            <x-hoverableDrop :id="$post->id" type="post" />
        @endif
    @endauth
    <article
        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
        <div class="py-6 px-5 lg:flex">
            <div class="flex-1 lg:mr-8">
                <img src="{{asset('storage/'. $post->thumbnail)}}" alt="Blog Post illustration" style="height: 400px; width: 550px; " class="rounded-xl">
            </div>

            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-8 lg:mt-0">
                    <div class="space-x-2">
                        <a href="/?category={{$post->category->name}}"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{$post->category->name}}</a>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl">
                            {{$post->title}}
        {{--                    This is a big title and it will look great on two or even three lines. Wooohoo!--}}
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                                                Published <time>{{$post->created_at->diffForHumans()}}</time>
                                            </span>
                    </div>
                </header>

                <div class="text-sm mt-2">
                    <p class="mt-4">
                        {{$post->excerpt}}
                    </p>
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img src="{{asset('/storage/'.$post->user->thumbnail)}}" alt="Lary avatar" class="rounded-xl" width="65px" height="100px">
                        <div class="ml-3">
                            <h5 class="font-bold"><a href="/?user={{$post->user->name}}">{{$post->user->name}}</a></h5>
                        </div>
                    </div>

                    <div class="hidden lg:block">
                        <a href="/post/{{str_replace(' ','-',$post->title)}}"
                           class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                        >Read More</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</div>
