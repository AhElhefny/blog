<x-admin.layout>
    <div class="">
        <div class="container-xxl flex-grow-1 container-p-y">
            <span class="text-center">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted  fw-light">User/</span> Edit</h4>
            </span>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-7">
                    <div class="card mb-4 " style="left: 235px">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Update user</h5>
                        </div>
                        <div class="card-body">
                            <form action="/admin/users/{{$user->id}}/update" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('PATCH')
                                {{--                                                            start thumbnail--}}
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img
                                        src="{{asset('storage/'.$user->thumbnail)}}"
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
                                                value="{{'storage/'.$user->thumbnail}}"
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
                                    <label class="form-label" for="basic-default-fullname">name</label>
                                    <input type="text" name="name" value="{{$user->name   }}" class="form-control" id="basic-default-fullname" placeholder="post title" />
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">username</label>
                                    <input type="text" name="username" value="{{$user->username   }}" class="form-control" id="basic-default-fullname" placeholder="post title" />
                                    @error('username')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">email</label>
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control" id="basic-default-company" placeholder="post description" />
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Password</label>
                                    <input
                                        id="basic-default-message"
                                        name="password"
                                        type="password"
                                        class="form-control"
                                        placeholder="Re-write Password again"
                                    />
                                </div>
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-phone">Role</label>
                                    <div class="row mb-3 w-40">
                                        <div class="btn-group">
                                            <select name="role"  class=" btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <option class="dropdown-item bg-white" selected disabled value="#">User Role</option>
                                                <option class="dropdown-item bg-white" {{($user->role=='admin')?'selected':''}} value="admin">admin</option>
                                                <option class="dropdown-item bg-white" {{($user->role=='user')?'selected':''}} value="user">user</option>
                                            </select>
                                        </div>
                                        @error('role')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-admin.layout>
