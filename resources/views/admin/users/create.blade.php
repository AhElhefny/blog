<x-admin.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Create User</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4" style="width: 800px;left: 125px;">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Create User</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="/admin/users/store" method="post">
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

                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    @error('thumbnail')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>

                            {{--                            end thumbnail                       --}}

                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="basic-default-name" placeholder="your name" />
                                </div>
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" value="{{old('username')}}" class="form-control" id="basic-default-name" placeholder="your username" />
                                </div>
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">email</label>
                                <div class="col-sm-10">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="basic-default-company"
                                        name="email"
                                        value="{{old('email')}}"
                                        placeholder="your email."
                                    />
                                </div>
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">password</label>
                                <div class="col-sm-10">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                type="password"
                                name="password"
                                placeholder="type strong password"
                                aria-describedby="basic-icon-default-message2"
                            />
                                </div>
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3 w-40">
                                <div class="btn-group" style="left: 132px; flex: 0">
                                    <select name="role"  class=" btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <option class="dropdown-item bg-white" selected disabled value="#">User Role</option>
                                        <option class="dropdown-item bg-white" value="admin">admin</option>
                                        <option class="dropdown-item bg-white" value="user">user</option>
                                    </select>
                                </div>
                                @error('role')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
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
