@extends('admin.admin_master')
@section('admin')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password</h4><br><br>
                            
                            
                            
                           
                         {{-- @php
                            if (count($errors)){ 
                             foreach ($errors->all() as $error){
                                session()->flash('message',$error);
                              session()->flash('alert-type','error');
                           
                            
                             }
                            } 
                              
                            @endphp   --}}
                          
                        

                             
                           
                                
                             {{-- @if (count($errors))
                                @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif --}}
                            <form action="{{ route('update.password') }}" method="POST" >
                                @csrf

                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="oldpassword" id="oldpassword" placeholder="Old Password">
                                
                                    @error('oldpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="New Password">
                                    @error('newpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                    @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                            
                          <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Password" name="update_profile">
                        </form>   
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            
            </div>
          
        </div>
        
    </div>
  
    @include('admin.body.footer')
    
@endsection