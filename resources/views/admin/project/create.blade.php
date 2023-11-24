@extends('admin.master')
@section('title') Projects Add @endsection
@section('project') active show-sub @endsection
@section('add-project') active @endsection


@section('content')
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
            <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a>
            <span class="breadcrumb-item active">Add New project</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/projects') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Project Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="ptitle" placeholder="Enter Project Title" required />
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
                                        <input class="form-control" type="text" name="pclient" placeholder="Enter Client Name " required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Type: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id" required>
                                            <option label="Choose one"></option>
                                            @foreach($category as $data)
                                            <option label="{{$data->cname}}" value="{{$data->id}}"></option>
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
                                        <input class="form-control" type="text" name="plocation" placeholder="Enter Project Location " required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Build Area : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="tba" placeholder="Enter Total Build Area " required />
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
                                        <input class="form-control" type="text" name="land_area" placeholder="Enter Land Area " required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Period : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="period" placeholder="Enter Period for project " required />
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
                                        <label class="form-control-label">Project Images : <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="images[]" placeholder="Enter Land Area " multiple required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Status: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One" name="status" required>
                                            <option label="Choose one"></option>
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
                                <label class="form-control-label">Video Embed Text : </label>
                                <input class="form-control" type="text" name="video" placeholder="Enter Embed Text Here"  />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>  
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Design Team: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="design_team" placeholder="Enter Team members name" required />
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
                                    <textarea class="form-control" rows="4" cols="8" name="pdescription" id="description" placeholder="Enter project description here " ></textarea>
                                </div>
                                </div> 
                            </div>
                        </div>

                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Project</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
</div>  
@endsection
