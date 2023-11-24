@extends('admin.master')
@section('title') Projects Add @endsection
@section('project') active show-sub @endsection
@section('add-project') active @endsection


@section('content')
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
            <a class="breadcrumb-item" href="{{ url('/projects') }}">Project</a>
        <a class="breadcrumb-item" href="{{ url('/projects') }}">All Projects</a>
        <a class="breadcrumb-item" href="{{route('projects.show',$project->id)}}">Project Details</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/projects',$project->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')    
                    @csrf
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Project Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="ptitle" value="{{$project->ptitle}}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>  
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Client Name : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="pclient" value="{{$project->pclient}}" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Type: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id" required>
                                            
                                            @foreach($category as $data)
                                            <!-- <option label="{{$data->cname}}"></option> -->
                                            <option class="text-capitalize" label="{{$data->cname}}" value="{{$data->id}}"></option>
                                            @endforeach  
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Project Location : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="plocation" value="{{$project->plocation}}" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Build Area : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="tba" value="{{$project->tba}}" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Land Area : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="land_area" value="{{$project->land_area}}" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Period : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="period" value="{{$project->period}}" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                <div class="form-group">
                                        <label class="form-control-label">Priority: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One" name="priority" required>
                                            <option label="{{$project->priority}}" value="{{$project->priority}}"></option>
                                            <option label="First" value="3"></option>
                                            <option label="Second" value="2"></option>
                                            <option label="Third" value="1"></option>
                                            <option label="Default" value="0"></option>
                                             
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Change Status: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One" name="status" required>
                                            <option label="{{$project->status}}" value="{{$project->status}}"></option>
                                            <option label="Under Construction" value="Under Construction"></option>
                                            <option label="Pending" value="Pending"></option>
                                            <option label="Done" value="Done"></option>
                                             
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Design Team: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="design_team" value="{{$project->design_team}}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>  
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description : <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" rows="4" cols="8" name="pdescription" value="{{$project->pdescription}}" id="description" >{{  $project->pdescription}}</textarea>
                                </div>
                                </div> 
                            </div>
                        </div>

                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="sl-pagebody">
        <a href="{{route('addimage',$project->id)}}" class="btn btn-sm btn btn-success">Add new Image</a>
            <div class="row row-sm">
           
                @foreach($project->images as $data)
                
                <div class="col-sm-6 col-xl-3 p-2" >
                    <div class="card bd-0">
                        <img class="card-img img-fluid" src="{{ asset('images/' . $data->image) }}" alt="Image">
                        <!-- <a href="#" onclick="deleteConfirmation({{$data->id}})"> Delete </a> -->
                        <div class="col-md-12 text-center">
                        <form method="POST" action="{{ route('projectimage.destroy', $data->id) }}">
                            @csrf
                             @method('DELETE') 
                            <input name="_method" type="hidden" value="DELETE">
                            
                            <button type="submit" class=" btn fa fa-trash text-danger show_confirmimage" data-toggle="tooltip" title='Delete'></button>
                            
                        </form>
                        </div>
                        
                        

                        
                    </div>
                    <!-- card -->
                </div>

                @endforeach 
                <div id="demo"></div>
                
            </div>
            <!-- row -->
        </div>
</div>  
@endsection
