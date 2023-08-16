@extends('admin.admin-master')
@section('title')
    Admin Profile | Real Estate
@endsection
@section('page-content')
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle"
                                    src="{{ !empty($profileData->photo) ? asset('/') . $profileData->photo : url('upload/admin-image/no_image.jpg') }}"
                                    alt="profile">
                                <span class="h4 ms-3">{{ $profileData->username }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Admin Profile</h6>

                            <form class="forms-sample">
                                <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username"
                                            id="exampleInputUsername2" value="{{ $profileData->username }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="exampleInputUsername2"
                                            value="{{ $profileData->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail2"
                                            value="{{ $profileData->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" id="exampleInputEmail2"
                                            value="{{ $profileData->phone }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="address">{{ $profileData->address }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" name="photo"
                                            id="exampleInputEmail2" value="{{ $profileData->photo }}">
                                        <img class="wd-80 rounded-circle mt-3" id="showImage"
                                            src="{{ !empty($profileData->photo) ? asset('/') . $profileData->photo : url('upload/admin-image/no_image.jpg') }}"
                                            alt="profile">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
