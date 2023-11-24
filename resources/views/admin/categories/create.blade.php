@extends('admin.master')
@section('title') Category Add @endsection
@section('category') active show-sub @endsection
@section('add-category') active @endsection


@section('content')
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
            <!-- <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a> -->
            <span class="breadcrumb-item active">Add New Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/categories') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="cname" placeholder="Enter Category Name" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Category Image : <span class="tx-danger"></span></label>
                                        <input class="form-control" type="file" name="image" />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
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
