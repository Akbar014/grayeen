@extends('admin.master')
@section('title') Slider Edit @endsection
@section('slider') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <span class="breadcrumb-item active">Slider</span>
    </nav>
    <div class="row">
        <div class="sl-pagebody col-md-6">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/sliders',$slider->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Select position: </label>
                                <select class="form-control select2-show-search" data-placeholder="Select One" name="position">
                                    @if($slider->position==0)
                                    <option label="First" value="{{$slider->position}}"></option>
                                    <option label="Default" value="1"></option>
                                    @else
                                    <option label="Default" value="{{$slider->position}}"></option>
                                    <option label="First" value="0"></option>
                                    @endif
                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Select status: </label>
                                <select class="form-control select2-show-search" data-placeholder="Select One" name="status">
                                    @if($slider->status==0)
                                    <option label="Off" value="{{$slider->status}}"></option>
                                    <option label="On " value="1"></option>
                                    @else
                                    <option label="On" value="{{$slider->status}}"></option>
                                    <option label="Off " value="0"></option>
                                    @endif

                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <input type="text" name="description" value="{{$slider->description}}" class="form-control">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Slider Image : <span class="tx-danger"></span></label>
                                        <input class="form-control" type="file" name="image" />
                                        @error('model')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if($slider->image)
                                    <img src="{{asset('images/'.$slider->image)}}" style="height:150px;width:150px;" alt="Current Image">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;"> Update </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>

</div>
@endsection