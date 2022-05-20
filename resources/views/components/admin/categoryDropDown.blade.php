@props(['categories','st'=>'','selectedCat'])
<div class="row mb-3 w-40">
    <div class="btn-group" style="{{$st}}">
        <select name="category_id"  class=" btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <option class="dropdown-item bg-white" selected disabled value="#">Categories</option>
            @foreach($categories as $c)
                <option class="dropdown-item bg-white"{{(isset($selectedCat))?($c->id==$selectedCat)?'selected':'':''}} value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    @error('category_id')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
