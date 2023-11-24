@extends('admin.master')
@section('title') Category Add @endsection
<!-- @section('category') active show-sub @endsection -->
@section('category') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a>
        <a class="breadcrumb-item" href="{{ route('categories.index') }}">Category List</a>
        <span class="breadcrumb-item active">Edit </span>
    </nav>
    <div class="sl-pagebody">
        <div class="row">
            <div class="sl-pagebody col-md-6">
                <div class="card pd-20 pd-sm-40">
                    @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{ url('/categories', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')    
                    @csrf
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="cname" value="{{$category->cname}}" required />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Category Image :</label>
                                            <input class="form-control" type="file" name="image" />
                                            @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if($category->image)
                                        <img src="{{asset('images/'.$category->image)}}" style="height:150px;width:150px;" alt="Current Image">
                                        @endif
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


        </div>
    </div>


</div>
@endsection