@extends('website.website-master')
@section('title')
    Sign Up | Real Estate
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
                <h1>Sign In</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Sign In</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- ragister-section -->
    <section class="ragister-section centred sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                    <div class="sec-title">
                        <h5>Sign up</h5>
                        <h2>Sign In With Realshed</h2>
                    </div>
                    <div class="tabs-box">
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons centred clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">Agent</li>
                                <li class="tab-btn" data-tab="#tab-2">User</li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="inner-box">
                                    <h4>Sign up</h4>
                                    <form action="http://azim.commonsupport.com/Realshed/signin.html" method="post"
                                        class="default-form">
                                        <div class="form-group">
                                            <label>Agent name</label>
                                            <input type="text" name="name" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" name="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="name" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="name" required="">
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="othre-text">
                                        <p>Already have an account? <a href="signin.html">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="inner-box">
                                    <h4>Sign up</h4>
                                    <form action="{{route('store.new.profile')}}"
                                        method="post" enctype="multipart/form-data" class="default-form custom-form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label @error('name')
                                                is-invalid
                                                @enderror">Name</label>
                                            <input type="text" name="name" required="">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>User name</label>
                                            <input type="text" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-group">
                                                <label class="form-label @error('email')
                                                is-invalid
                                                @enderror">Email address</label>
                                            <input type="email" name="email" required="">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-group">
                                                <label class="form-label @error('password')
                                                is-invalid
                                                @enderror">New Password</label>
                                            <input type="password" name="password" required="">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-group">
                                                <label class="form-label @error('phone')
                                                is-invalid
                                                @enderror">Phone</label>
                                            <input type="text" name="phone">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" class="form-control-file" name="photo" id="image">
                                            <img id="showImage" src="" alt="profile">
                                        </div>
                                        <div class="form-group">
                                                <label>Role</label>
                                                <div>
                                                   <label> <input type="radio" name="role" value="user" checked> User</label>
                                                </div>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="othre-text">
                                        <p>Already have an account? <a href="{{ route('agent-or-user.login') }}">Sign in</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ragister-section end -->

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
