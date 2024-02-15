@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile</h4>
                            <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $adminData->name }}" id="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="username" value="{{ $adminData->username }}" id="username">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email" value="{{ $adminData->email }}" id="email">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Change Profile Photo:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="profile_image" value="" id="image" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <img id="ShowImage" class="rounded avatar-lg" src="{{ (!empty($adminData->profile_image) ? url('upload/profile_image/' . $adminData->profile_image) : url('upload/no_image.jpg')) }}" alt="Card image cap">

                            </div>
                          <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Profile" name="update_profile">
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