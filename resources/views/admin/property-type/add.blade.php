@extends('admin.admin-master')
@section('title')
    Add Property Type
@endsection

@section('page-content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Property Type</h6>

                        <form class="forms-sample" action="{{ route('propertyType.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Property-type
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="property_type_name"
                                        id="exampleInputUsername2" placeholder="Enter Your Property Type Name" required>
                                    @error('property_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Property-type Icon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="property_type_icon"
                                        id="exampleInputEmail2" autocomplete="off"
                                        placeholder="Enter Your Property Type Icon">
                                    @error('property_type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-inverse-success me-2">Add Property Type</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
