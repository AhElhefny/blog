@props(['style'=>'','id','type'])
<div class="dropdown" style="float: right;{{$style}}">
    <button class="dropbtn" style="background-color: transparent; "><i class="bx bx-dots-vertical-rounded" aria-hidden="true"></i></button>
    <div class="dropdown-content" style="right: 0; min-width: 120px; text-align: left">
        <a href="/{{$type}}/{{$id}}/edit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
        <a href="#">
            <form method="post" action="/{{$type}}/{{$id}}">
                @csrf
                @method('DELETE')
                <i class="bx bx-trash me-1"></i>
                <input type="submit" value="Delete">
            </form>
        </a>
    </div>
</div>



