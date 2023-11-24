@extends('admin.master')
@section('title') Slider Add @endsection
@section('vidoe') active @endsection


@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <span class="breadcrumb-item active">Video</span>
    </nav>


    <div class="row">
        <div class=" sl-pagebody col-md-12">
            <a href="{{route('videos.create')}}" class="btn btn-info">Add new video </a>
            <div class="card pd-20 pd-sm-40 mt-2">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <div class="table-responsive">
                
                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection