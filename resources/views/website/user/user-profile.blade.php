@extends('website.website-master')

@section('title')
    User Profile | Real Estate
@endsection

@section('page-content')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>My Profile</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>My Profile</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="image-sizing">
                                        <img src="{{ !empty($profileData->photo) ? asset('/') . $profileData->photo : url('upload/user-image/no_image.jpg') }}"
                                            alt="profile">
                                        <span>{{ $profileData->username }}</span>
                                    </div>
                                    <div class="profile-content">
                                        <div class="mt-3">
                                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
                                            <p>{{ $profileData->role }}</p>
                                        </div>
                                        <div class="mt-3">
                                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                                            <p>{{ $profileData->name }}</p>
                                        </div>
                                        <div class="mt-3">
                                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                            <p>{{ $profileData->email }}</p>
                                        </div>
                                        <div class="mt-3">
                                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                                            <p>{{ $profileData->phone }}</p>
                                        </div>
                                        <div class="mt-3">
                                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                                            <p>{{ $profileData->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="py-3">Update User Profile</h3>
                                    <form class="custom-form" action="{{route('userProfile.update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Username</label>
                                            <input type="text" name="username" value="{{ $profileData->username }}"
                                                class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ $profileData->name }}"
                                                class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ $profileData->email }}"
                                                class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Mobile</label>
                                            <input type="text" name="phone" value="{{ $profileData->phone }}"
                                                class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Address</label>
                                            <textarea name="address" class="form-control">{{ $profileData->address }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Image</label>
                                            <input type="file" name="photo" class="form-control-file" id="image">
                                            <img id="showImage"
                                                src="{{ !empty($profileData->photo) ? asset('/') . $profileData->photo : url('upload/user-image/no_image.jpg') }}"
                                                alt="profile">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success w-100">Update Profile</button>
                                            <a href="{{route('user.change.password')}}" class="mt-2">Change Password</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
