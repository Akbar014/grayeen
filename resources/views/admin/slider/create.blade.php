@extends('admin.master')
@section('title') Slider Add @endsection
@section('slider') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <span class="breadcrumb-item active">Slider</span>
    </nav>
    <div class="row">
        <div class="sl-pagebody col-md-12">
        <a href="{{route('sliders.index')}}" class="btn btn-info">All Slide  </a>
            <div class="card pd-20 pd-sm-40 mt-2">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/sliders') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Select position: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select One" name="position" required>
                                    <option label="Choose one"></option>
                                    <option label="First" value="0"></option>
                                    <option label="Other " value="1"></option>
                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <input type="text" name="description" class="form-control">
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

</div>
@endsection