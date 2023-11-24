@extends('admin.master')
@section('title') About @endsection

@section('about') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a>
        <span class="breadcrumb-item active">About </span>
    </nav>
    <div class="row">
        <div class="sl-pagebody col-md-12">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                @foreach($about as $data)
                <form action="{{ url('/about/update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                                <textarea name="description" id="" cols="100" rows="8" class="form-control">{{$data->description}}</textarea>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">About Image : <span class="tx-danger"></span></label>
                                        <input class="form-control" type="file" name="image" />
                                        @error('model')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if($data->image)
                                    <img src="{{asset('images/'.$data->image)}}" style="height:150px;width:150px;" alt="Current Image">
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update </button>
                        </div>
                    </div>

                </form>
                @endforeach
            </div>
        </div>
        

    </div>

</div>
@endsection