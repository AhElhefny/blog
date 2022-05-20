@props(['currentCat'])
<!doctype html>
<title>Laravel From Scratch Blog</title>
<link href="{{asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css')}}" rel="stylesheet">
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}">
@if(request()->route()->named('editPost') || request()->route()->named('userProfile'))
<link href="{{asset('links/css/core.css')}}" rel="stylesheet">
@endif
<link href="{{asset('/css/demo.css')}}" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="{{asset('/img/favicon/favicon.icon')}}" />
<link rel="stylesheet" href="{{asset('/links/fonts/boxicons.css')}}" />
<link href="{{asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap')}}" rel="stylesheet">
<script src="{{asset('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js')}}" defer> </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
    html{
        scroll-behavior: smooth;
    }
    body{
        background-color: white;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="{{asset('/images/logo.svg')}}" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0">
            @auth
                <div class="dropdown">
                    <button class="dropbtn">Welcome, {{auth()->user()->name}}!</button>
                    <div class="dropdown-content">
                        <a href="/user/profile">My Profile</a>
                        @if(auth()->user()->role==='admin')
                            <a href="/admin/dashboard">Dashboard</a>
                        @endif
                        <a href="#">
                            <form method="post" action="/logout">
                                @csrf
                                <button   type="submit">Log Out</button>
                            </form>
                        </a>
                    </div>
                </div>
            @else
                <div class="dropdown">
                    <button class="dropbtn">Welcome, Login|Register!</button>
                    <div class="dropdown-content">
                            <a class="text-xs font-bold uppercase" href="/register">Register</a>
                            <a href="/login" class="text-xs font-bold uppercase">Log In</a>
                    </div>
                </div>

            @endauth


                <a href="#footer" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                SUBSCRIBE FOR UPDATES
            </a>

        </div>
    </nav>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Laravel From Scratch</span> News
        </h1>


        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Category -->
            <x-category-dropdown />

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="/">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{request('category')}}">
                    @elseif(request('user'))
                        <input type="hidden" name="user" value="{{request('user')}}">
                    @endif
                    <input type="text" name="search" value="{{request('search')}}" placeholder="Find something"
                           class="bg-transparent placeholder-black font-semibold text-sm">
                </form>
            </div>
        </div>
    </header>

{{$slot}}
    <footer id="footer" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="{{asset('/images/lary-newsletter-icon.svg')}}" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="#" class="lg:flex text-sm">
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="{{asset('/images/mailbox-icon.svg')}}" alt="mailbox letter">
                        </label>

                        <input id="email" type="text" placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
    @if (session()->has('success') || session()->has('logoutSuccess') )
        <div x-data="{ show: true }"
             x-init="setTimeout(()=> show = false, 4000)"
             x-show="show"
             class="fixed bg-blue-500 text-white py-2 px-4  rounded-xl bottom-3 right-3 text-sm">
            <p>{{(session()->has('logoutSuccess'))? session('logoutSuccess'): session('success') }}</p>
        </div>
        @endif
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
