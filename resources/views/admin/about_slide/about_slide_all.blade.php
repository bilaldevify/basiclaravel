@extends('admin.admin_master')
@section('admin')

@php
   $aboutslide=App\Models\About::find(1);
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit About Slide</h4>
                            <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <input type="hidden" name="id" id="id" value="{{ $aboutslide->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{ $aboutslide->title }}" id="title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="short_title" value="{{ $aboutslide->short_title }}" id="shor_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="short_description" id="short_description" >{{ $aboutslide->short_description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description">{{ $aboutslide->long_description }}</textarea>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="about_image" value="" id="image" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <img id="ShowImage" class="rounded avatar-lg" src="{{ (!empty($aboutslide->about_image) ? url($aboutslide->about_image) : url('upload/no_image.jpg')) }}" alt="Card image cap">


                            </div>
                          <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update About Page" name="update_slide">
                        </form>   
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            
            </div>
          
        </div>
        
    </div>
   
   <script>
   $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#ShowImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});

   </script>
    @include('admin.body.footer')
    
@endsection