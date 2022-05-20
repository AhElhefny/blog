@props(['posts'])
<x-main-post-card :post="$posts[0]" />
@if($posts->count() >1 )
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            <x-other-post-card :otherPost="$post" class="{{($loop->iteration >=3)?'col-span-2':'col-span-3'}}" />
        @endforeach
    </div>
@endif
