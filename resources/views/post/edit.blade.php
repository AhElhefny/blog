<x-layout>
    <div class="">
        <div class="container-xxl flex-grow-1 container-p-y">
            <span class="text-center">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted  fw-light">Post/</span> Edit</h4>
            </span>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-7">
                    <div class="card mb-4 bg-gray-200" style="left: 303px">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Update post</h5>
                        </div>
                        <div class="card-body">
                            <form action="/post/{{$post->id}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('PATCH')
                                {{--                                                            start thumbnail--}}
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img
                                        src="{{asset('storage/'.$post->thumbnail)}}"
                                        alt="user-avatar"
                                        class="d-block rounded"
                                        height="100"
                                        width="100"
                                        id="uploadedAvatar"
                                    />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input
                                                type="file"
                                                id="upload"
                                                class="account-file-input"
                                                value="{{'storage/'.$post->thumbnail}}"
                                                name="thumbnail"
                                                hidden
                                                accept="image/png, image/jpeg"
                                            />
                                        </label>
                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                    @error('thumbnail')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                {{--                            end thumbnail                       --}}

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">title</label>
                                    <input type="text" name="title" value="{{$post->title   }}" class="form-control" id="basic-default-fullname" placeholder="post title" />
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">excerpt</label>
                                    <input type="text" name="excerpt" value="{{$post->excerpt}}" class="form-control" id="basic-default-company" placeholder="post description" />
                                    @error('excerpt')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">published by</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="text"
                                            id="basic-default-email"
                                            class="form-control"
                                            name="user_id"
                                            value="{{$post->user_id}}"
                                            placeholder="john.doe"
                                            aria-label="john.doe"
                                            readonly
                                            aria-describedby="basic-default-email2"
                                        />

                                        <span class="input-group-text" id="basic-default-email2">{{$post->user->name}}</span>
                                    </div>
                                    @error('user_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-phone">published In</label>
                                    <x-admin.categoryDropDown :categories="$categories" :selectedCat="$post->category_id" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">post content</label>
                                    <input
                                        id="basic-default-message"
                                        name="body"
                                        value="{{$post->body}}"
                                        class="form-control"
                                    />
                                </div>
                                <button type="submit" class="btn btn-info">Send</button>
                                <button type="button" class="btn btn-secondary "><a href="/" style="color: white">cancel</a></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-layout>
