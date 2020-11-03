@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">
        @if($message = Session::get('faliure'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <h1 class="mt-4">Publication List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Publication List</li>
        </ol>
        <form style="background-color: #e9ecef;border-radius:5px" action="/publication/publicationList/search" method="get" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <br>
            <div style="margin-left:1px;margin-right:1px;" class="row">
                <div class="col-md-4 mb-3">
                    <label for="validationDefault03">Search in Title</label>
                    <input name="title" type="search" class="form-control" placeholder="Search...">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault03">Search in first Description</label>
                    <input name="desc1" type="search" class="form-control" placeholder="Search...">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault03">Search in second Description</label>
                    <input name="desc2" type="search" class="form-control" placeholder="Search...">
                </div>
            </div>
            <div class="col-md-12 mb-2 mt-3 text-center">
                <button style="text-align:center" class="btn btn-primary" type="submit">Search</button>
            </div>
            <br>
        </form>
        <hr>
        <div class="table-responsive text-nowrap">
            <table id="experience_table" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Desc2</th>
                        <!-- <th scope="col">Desc3</th>
                        <th scope="col">Desc4</th> -->
                        <th scope="col">Each</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publication as $eachPublication)
                        <tr>
                            <td>{{ $eachPublication->title }}</td>
                            <td>{{ $eachPublication->desc }}</td>
                            <td>{{ $eachPublication->desc2 }}</td>  
                            <td><a class="btn btn-danger" href="/publication/eachPublication/{{ $eachPublication->id }}">{{ $eachPublication->id }}</a></td>
                            <td><a href="/publication/editPublication/{{ $eachPublication->id }}" class="btn btn-danger">Edit</a></td>
                            <td>
                                <form action="{{ route('publication.destroy', $eachPublication->id) }}" method="POST">
                                    {{ @csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
@endsection