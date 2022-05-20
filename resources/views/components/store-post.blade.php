<div style=" width: 600px; margin-bottom:66px; margin-left:287px;" class="bg-gray-100">
    <form  id="createPost"  enctype="multipart/form-data" class="border border-gray-200 p-6 rounded-xl">
{{--        method="post" action="/post/create"--}}
        <x-form.header header="Want to publish one? " />

        <x-form.input name="title"/>

        <x-form.input name="thumbnail" type="file"/>

        <x-cat-drop-post id="cat"/>

        <x-form.textarea name="excerpt" />

        <x-form.textarea name="body" />

        <x-form.submit txt="post"  />
        @error('category_id')<span>{{$message}}</span>@enderror
    </form>
</div>
