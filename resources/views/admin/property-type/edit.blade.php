@extends('admin.admin-master')
@section('title')
    Edit Property Type
@endsection

@section('page-content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Property Type</h6>

                        <form class="forms-sample" action="{{route('propertyType.update',['id' => $propertyType->id])}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Property-type
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="property_type_name" id="exampleInputUsername2"
                                       value="{{$propertyType->property_type_name}}" placeholder="Enter Your Property Type Name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Property-type Icon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="property_type_icon" id="exampleInputEmail2" autocomplete="off"
                                    value="{{$propertyType->property_type_icon}}" placeholder="Enter Your Property Type Icon">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-inverse-success me-2">Update Property Type</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
