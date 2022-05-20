@props(['postId'=>'','left'=>'0px'])
<div class="dropdown" style="z-index: 999; left: {{$left}}; top: 30px;">
    <button
        class="btn btn-danger p-0"
        type="button"
        id="cardOpt3"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
        <a class="dropdown-item" href="/admin/posts/{{$postId}}/edit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
        <a class="dropdown-item" href="/admin/posts/{{$postId}}/delete"><i class="bx bx-trash me-1"></i> Delete</a>
    </div>
</div>
