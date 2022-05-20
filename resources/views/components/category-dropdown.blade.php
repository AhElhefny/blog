<div class="relative flex lg:inline-flex items-center W-37 bg-gray-100 rounded-xl">
    <div x-data="{ show:false }" class="py-2">
        <button @click="show=!show" @click.away="show=false"
                class="py-2 pl-3 pr-9 text-sm font-semibold w-full inline-flex">{{ (request('category') !== null)?request('category'):" All Cartegories" }}

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>

        </button>
        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-round-xl overflow-auto max-h-40 rounded-xl">
            @foreach($categories as $category)
                <a href="/?category={{$category->name }}&{{http_build_query(request()->except(['category','page']))}}"
                   style="white-space: nowrap"
                   class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{(request('category') !== null)?(request('category') === $category->name)?"bg-blue-500":"":''}} ">{{ucwords($category->name)}}</a>
            @endforeach
        </div>
    </div>

</div>
