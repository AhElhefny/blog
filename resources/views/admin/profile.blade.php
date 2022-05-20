<x-admin.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="{{asset('/storage/'.auth()->user()->thumbnail)}}"
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
                                        hidden
                                        accept="image/png, image/jpeg"
                                    />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Full Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="fullName"
                                        name="fullName"
                                        value="{{auth()->user()->name}}"
                                        autofocus
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="Name" id="Name" value="{{auth()->user()->username}}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="email"
                                        name="email"
                                        value="{{auth()->user()->email}}"
                                        placeholder="john.doe@example.com"
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">EG (+20)</span>
                                        <input
                                            type="text"
                                            id="phoneNumber"
                                            name="phoneNumber"
                                            class="form-control"
                                            placeholder="106 432 2137"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="zipCode"
                                        name="zipCode"
                                        placeholder="231465"
                                        maxlength="6"
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="country">Country</label>
                                    <select id="country" class="select2 form-select">
                                        <option value="">Select</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia" selected>Russian Federation</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="language" class="form-label">Language</label>
                                    <select id="language" class="select2 form-select">
                                        <option value="">Select Language</option>
                                        <option value="en" selected>English</option>
                                        <option value="fr">French</option>
                                        <option value="de">German</option>
                                        <option value="pt">Portuguese</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div id="posts" class="m-3">
        <!-- Horizontal -->
        <h5 class="pb-1 mb-4">ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ<span class="text-black-50">MY POSTS</span>ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</h5>

        <div class="row ">
            @foreach(auth()->user()->posts as $key=>$post)
                @if($key % 2 ==0)
                    <div class="col-6 mb-4">
                        <x-admin.threeDotAdminPost  :postId="$post->id" left="490px" />
                        <div class="col-md" style="height: 195px;">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img class="card-img card-img-left" height="90%" src="{{asset('/storage/'.$post->thumbnail)}}" alt="Card image" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <p class="card-text">
                                                {{$post->excerpt}}.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated {{$post->created_at->diffForHumans()}}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-6 mb-4" style="height: 195px;">
                        <x-admin.threeDotAdminPost :postId="$post->id" left="2px"  />
                        <div class="col-md">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <p class="card-text">
                                                {{$post->excerpt}}.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated {{$post->created_at->diffForHumans()}}</small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="card-img card-img-right" height="90%" src="{{asset('/storage/'.$post->thumbnail)}}" alt="Card image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!--/ Horizontal -->

    </div>
</x-admin.layout>
