@extends('admin.admin_master')
@section('admin')

@php
    $homeslide=App\Models\HomeSlide::find(1);
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Slide</h4>
                            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <input type="hidden" name="id" id="id" value="{{ $homeslide->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{ $homeslide->title }}" id="title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="short_title" value="{{ $homeslide->short_title }}" id="short_title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="video_url" value="{{ $homeslide->video_url }}" id="video_url">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="home_slide" value="" id="image" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <img id="ShowImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide) ? url($homeslide->home_slide) : url('upload/no_image.jpg')) }}" alt="Card image cap">


                            </div>
                          <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Slide" name="update_slide">
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