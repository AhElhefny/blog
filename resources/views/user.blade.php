<x-layout >
    <div class="profile-card">
        <div class="profile-cover">
            <div class="menu-container">
                <a class="list-icon" title="Expand" href="javascript:void(0);"></a>
                <ul class="profile-actions" style="display: none;">
                    <li><a href="/">Home</a></li>
                    <li><a href="#posts">My Posts</a></li>
                    <li><a href="#">Like</a></li>
                </ul>
            </div>
            <div class="profile-avatar">
                <div class="btns-container">
                    <div class="profile-links">
                        <a class="read-more" href="#"><img src="https://dl.dropboxusercontent.com/s/62dfoo9h44o58lw/more.png"></a>
                    </div>
                </div>
                <a href="#"><img src="{{asset('storage/'.auth()->user()->thumbnail)}}" alt="Anis M" /></a>
            </div>
            <div class="profile-details">
                <h1>{{auth()->user()->name}}</h1>
                <h6>{{auth()->user()->email}}</h6>
            </div>
        </div>
        <div class="profile-info" style="display: none;">
            <h1>About Me</h1>
            <div class="info-area">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.Stet clita kasd gubergren, no sea takimata sanctus est.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
            </div>
            <div class="clear"></div>
        </div>
        <div class="profile-map" style="display: none;">
            <iframe width="100%" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Saveology+New+York&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=40.052282,86.572266&amp;t=h&amp;ie=UTF8&amp;hq=Saveology&amp;hnear=New+York&amp;ll=40.552027,-74.420902&amp;spn=0.357117,0.912844&amp;iwloc=near&amp;output=embed"></iframe>
            <div class="clear"></div>
        </div>
        <div class="profile-content">
            <ul>
                <li>
                    <div class="digits"></div>
                </li>
                <li>
                    <div class="digits">{{auth()->user()->name}}</div>
                    Name
                </li>
                <li>
                    <div class="digits">{{auth()->user()->username}}</div>
                    Full Name
                </li>
                <li>
                    <div class="digits">{{auth()->user()->role}}</div>
                    Role
                </li>
                <li>
                    <div class="digits">{{auth()->user()->created_at->format('Y')}}</div>
                    Since
                </li>
                <li>
                    <div class="digits">{{count(auth()->user()->posts)}}</div>
                    Posts
                </li>
                <li>
                    <div class="digits">{{count(auth()->user()->comments)}}</div>
                    Comments
                </li>
                <li>
                    <div class="digits">51</div>
                    Likes
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div id="posts">
        <div class="row mb-5">
            @foreach(auth()->user()->posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="col-md-6 col-lg-11">
                        <h6 class="mt-2 text-muted">Images</h6>
                        <div class="card mb-4">
                            <img class="card-img-top" style="height: 380px" src="{{asset('storage/'.$post->thumbnail)}}" alt="Card image cap" />
                            <div class="card-body">
                                <h2 class="card-text">
                                    {{$post->title}}
                                </h2>
                                <p class="card-text">
                                    {{$post->excerpt}}.
                                </p>
                                <p class="card-text">
                                    {{$post->body}}.
                                </p>
                                <p class="text-muted">
                                    <i class="bx bx-comment"></i><span class="mr-2"> Comments : {{count($post->comments)}}|</span>
                                    <i class="bx bx-like"></i><span> 88 |</span>
                                    <span class="ml-3"><i class="bx bx-detail"></i><a href="{{route('showPost',str_replace(' ','-',$post->title))}}" > Post:Details</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.menu-container').hover(
                function(){
                    $('.profile-actions').slideDown('fast');
                    $('.list-icon').addClass('active');
                },
                function(){
                    $('.profile-actions').slideUp('fast');
                    $('.list-icon').removeClass('active');
                }
            );
            $('.profile-card').mouseleave(function(){
                $('.profile-actions').slideUp('fast');
                $('.profile-info').slideUp('fast');
                $('.profile-map').slideUp('fast');
            });

            $('.profile-avatar').hover(
                function(){
                    $('.profile-links').fadeIn('fast');
                },
                function(){
                    $('.profile-links').hide();
                }
            );
            $('.read-more').click(function(){
                $('.profile-map').slideUp('fast');
                $('.profile-info').slideToggle('fast');
                return false;
            });
            $('.view-map').click(function(){
                $('.profile-info').slideUp('fast');
                $('.profile-map').slideToggle('fast');
                return false;
            });
        });
    </script>
</x-layout>
