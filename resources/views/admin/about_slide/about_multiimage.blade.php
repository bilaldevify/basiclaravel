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

                            <h4 class="card-title">About Multi Image</h4><br><br>
                            <form action="{{ route('store.multi.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <input type="hidden" name="id" id="id" value="{{ $aboutslide->id }}">
                          
                            
                            

                            
                            
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">About Multi  Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="multi_image[]" value="" id="image" multiple="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <img id="ShowImage" class="rounded avatar-lg" src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">


                            </div>
                          <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="About Multi Image" name="update_slide">
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