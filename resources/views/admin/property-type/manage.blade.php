@extends('admin.admin-master')
@section('title')
    Manage Property Type
@endsection

@section('page-content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Table</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>ID</th>
                                        <th>Property-type Name</th>
                                        <th>Property-type Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($propertyTypes as $propertyType)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $propertyType->id }}</td>
                                            <td>{{ $propertyType->property_type_name }}</td>
                                            <td>{{ $propertyType->property_type_icon }}</td>
                                            <td>
                                                <a href="{{route('propertyType.edit',['id' => $propertyType->id])}}" class="btn btn-inverse-warning">Edit</a>
                                                <a href="{{route('propertyType.delete',['id' => $propertyType->id])}}" class="btn btn-inverse-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
