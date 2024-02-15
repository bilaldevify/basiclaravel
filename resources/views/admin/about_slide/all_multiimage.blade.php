@extends('admin.admin_master')

@section('admin')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Multi Images</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">All Multi Images</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Multi Image</h4>
                           

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>All Multi Images</th>
                                    <th>Actions</th>
                                   
                                </tr>
                                </thead>


                                <tbody>
                                    @php($i=1)
                                        
                                  
                                    @foreach ($allMultiImage as  $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img style="width:50px; height:50px;" src="{{ asset($item->multi_image) }}" alt=""></td>
                                        <td>
                                            <a class="btn btn-info sm" title="Edit Data" href="{{ route('update.multi.image',$item->id) }}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger sm" id='delete' title="Edit Data" href="{{ route('delete.image',$item->id) }}"><i class=" fas fa-trash-alt"></i></a>

                                        </td>
                                       
                                    </tr>
                                    @endforeach
                                
                                  
                              
                                
                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



       

       

       

         
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    
 
    
</div>
@endsection