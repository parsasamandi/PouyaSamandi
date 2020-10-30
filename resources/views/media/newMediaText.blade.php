@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <h1 class="mt-4">New Media Text</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">New Media Text</li>
        </ol>
        <form class="background_table" action="/media/newMediaText/" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="row row_style">
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control" name="media_text" class="custom-file-input" placeholder="Media Text" required>
                </div>
            </div>
            <div class="col-md-12 mt-3 mb-2 text-center">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
            <br>
        </form>
        <hr>
    </div>
@endsection

