@props(['head'=>'Add New','uri'=>'store','cat'=>'','method'=>'post'])
<h5 class="card-header">{{$head}} Category</h5>
<div class="card-body">
    <form enctype="multipart/form-data" method="post" action="/admin/categories/{{$uri}}">
        @csrf
        @method($method)
        <div class="form-floating">
            <input
                type="text"
                class="form-control"
                id="floatingInput"
                name="name"
                value="{{$cat,old('name')}}"
                placeholder="John Doe"
                aria-describedby="floatingInputHelp"
            />
            <label for="floatingInput">Name</label>
            <div id="floatingInputHelp" class="form-text text-danger">
                @error('name')
                {{$message}}.
                @enderror
            </div>
        </div>
        <div class="demo-inline-spacing mt-3">
            <button type="submit" class="btn btn-outline-secondary">Add</button>
        </div>
    </form>
</div>
