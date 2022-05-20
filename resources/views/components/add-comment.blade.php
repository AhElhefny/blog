@props(['post'])
<div>
    <form id="commentForm"  class="border border-gray-200 p-6 rounded-xl">
{{--        action="/storeComment/{{$post->id}}" method="post"--}}
        <x-form.header header="Want to participate? " />

        <x-form.textarea name="body" />

        <x-form.submit txt="Add" />
    </form>
</div>
