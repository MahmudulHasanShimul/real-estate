@extends('admin.admin-master')
@section('title')
    Manage Amenity
@endsection

@section('page-content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Amenity</a></li>
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
                                        <th>Amenity Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenities as $amenity)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $amenity->id }}</td>
                                            <td>{{ $amenity->amenity_name }}</td>
                                            <td>
                                                <a href="{{route('amenity.edit',['id' => $amenity->id])}}" class="btn btn-inverse-warning">Edit</a>
                                                <a href="{{route('amenity.delete',['id' => $amenity->id])}}" class="btn btn-inverse-danger" id="delete">Delete</a>
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
