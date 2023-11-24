@extends('admin.master')
@section('title') Contact @endsection

@section('contact') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a>
        <span class="breadcrumb-item active">Contact </span>
    </nav>
    <div class="row">
        <div class="sl-pagebody col-md-12">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                @foreach($contact as $data)
                <form action="{{ url('/contact/update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row ">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Address 1: </label>
                                <input type="text" class="form-control" name="address1" value="{{$data->address1}}">

                                @error('address1')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Phone 1: </label>
                                <input type="text" class="form-control" name="phone1" value="{{$data->phone1}}">

                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email 1: </label>
                                <input type="text" class="form-control" name="mail1" value="{{$data->mail1}}">

                                @error('mail')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Address 2: </label>
                                <input type="text" class="form-control" name="address2" value="{{$data->address2}}">

                                @error('address2')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Phone 2: </label>
                                <input type="text" class="form-control" name="phone2" value="{{$data->phone2}}">

                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email 2: </label>
                                <input type="text" class="form-control" name="mail2" value="{{$data->mail2}}">

                                @error('mail')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Image : </label>
                                <input type="file" class="form-control" name="image" value="{{$data->mail2}}">


                                @error('mail')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if($data->image)
                            <img src="{{asset('images/'.$data->image)}}" style="height:150px;width:150px;" alt="Current Image">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Description: </label>
                                <input type="text" class="form-control" name="description" value="{{$data->description}}">

                                @error('mail')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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