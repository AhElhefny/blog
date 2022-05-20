<x-admin.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Posts/</span> Create Post</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Create Post</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="/admin/posts/store" method="post">
                            @csrf
                            {{--                            start thumbnail--}}
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img
                                        src="{{asset('images/illustration-2.png')}}"
                                        alt="user-avatar"
                                        class="d-block rounded"
                                        height="100"
                                        width="100"
                                        id="uploadedAvatar"
                                    />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input
                                                type="file"
                                                id="upload"
                                                class="account-file-input"
                                                name="thumbnail"
                                                hidden
                                                accept="image/png, image/jpeg"
                                            />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        @error('thumbnail')
                                        <p class="text-danger mb-0">{{$message}}</p>
                                        @enderror

                                    </div>
                                </div>

                            {{--                            end thumbnail                       --}}

                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="basic-default-name" placeholder="Post Title" />
                                </div>
                                @error('title')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">excerpt</label>
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="basic-default-company"
                                        name="excerpt"
                                        value="{{old('excerpt')}}"
                                        placeholder="post description."
                                    />
                                </div>
                                @error('excerpt')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Body</label>
                                <div class="col-sm-10">
                            <textarea
                                id="basic-default-message"
                                class="form-control"
                                name="body"
                                placeholder="Hi, Do you have a moment to talk Joe?"
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                            ></textarea>
                                </div>
                                @error('body')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <x-admin.categoryDropDown :categories="$categories" st="left: 169px; flex: 0" />

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
