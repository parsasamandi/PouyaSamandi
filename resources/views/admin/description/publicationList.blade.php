@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-block">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <h1 class="mt-4">Edit Description</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Description</li>
        </ol>
        <form class="background_table" action="/description/editDescription/{{ $description->id }}" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <br>
            <div class="col-md-12 mb-3">
                <input type="text" value="{{ $description->desc }}" name="desc1" placeholder="First Description" class="form-control">
            </div>
            <div class="row row_style">
                <div class="col-md-6 mb-3">
                    <label for="validationTextarea">Project Name</label>
                    <select name="projectBox" class="browser-default custom-select">
                        <option value="">Null</option>
                        @foreach($project as $eachProject)
                            <option name="project" value="{{ $eachProject->project_id }}" {{ $eachProject->project_id == $description->project_id ? 'selected' : '' }}  required>{{ $eachProject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationTextarea">Experience</label>
                    <select name="experienceBox" class="browser-default custom-select">
                        <option value="">Null</option>
                        @foreach($experience as $eachExperience)
                            <option name="experience" value="{{ $eachExperience->id }}" {{ $eachExperience->id == $description->experience_id ? 'selected' : '' }}  required>{{ $eachExperience->title }}</option>
                        @endforeach
                    </select>
                </div>  
            </div> 
            <div class="row row_style">
                <div class="col-md-12 mb-3">
                    <label for="validationTextarea">Size</label>
                    <input  value="{{ $description->size }}" type="text" class="form-control" name="size" class="custom-file-input" placeholder="Size">
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