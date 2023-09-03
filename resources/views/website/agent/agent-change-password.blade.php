@extends('website.website-master')

@section('title')
    Agent Change Password | Real Estate
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
                <h1>Change Password</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Change Password</li>
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
                                    <form class="custom-form" action="{{ route('agent.update.password') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1"
                                                class="form-label @error('old_password')
                                                is-invalid
                                            @enderror">Old
                                                Password</label>
                                            <input type="password" name="old_password" class="form-control"
                                                id="old_password">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">New Password</label>
                                            <input type="password" name="new_password"
                                                class="form-control @error('new_password')
                                                is-invalid
                                            @enderror"
                                                id="new_password">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                            <input type="password" name="new_password_confirmation" class="form-control"
                                                id="new_password_confirmation">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success w-100">Update Password</button>
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
