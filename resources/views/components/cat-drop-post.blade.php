<div class="mt-6">
    <select name="category_id" id="cat" class="w-full text-sm rounded-xl focus:outline-none focus:ring"
            style="border: lightskyblue solid 1px; ">
        <option value="category" selected disabled>Categories
        </option>
        @foreach($categories as $c)
            <option value="{{$c->id}}"
                {{(request('category') !== null)?(request('category')==$c->name)?'selected':'disabled':''}}
            >
                {{$c->name}}
            </option>
        @endforeach
    </select>
</div>
