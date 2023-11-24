@extends('admin.master')
@section('title') Add image  @endsection
<!-- @section('') active show-sub @endsection -->
@section('project') active @endsection


@section('content')
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
            <a class="breadcrumb-item" href="{{ url('/projects') }}">Project</a>
            <span class="breadcrumb-item active">Add New Image </span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/create_new_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Image : <span class="tx-danger"></span></label>
                                        <input class="form-control" type="file" name="image" />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  
                                </div>
                                <input type="hidden"  name="project_id" value="{{$project->id}}">
                                
                            </div>
                        </div>
                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>  
@endsection
