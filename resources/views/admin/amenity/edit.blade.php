@extends('admin.admin-master')
@section('title')
    Edit Amenity
@endsection

@section('page-content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Amenity</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Amenity</h6>

                        <form class="forms-sample" action="{{route('amenity.update',['id' => $amenity->id])}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Amenity
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="amenity_name" id="exampleInputUsername2"
                                       value="{{$amenity->amenity_name}}" placeholder="Enter Your Amenity Name" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-inverse-success me-2">Update Amenity</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
