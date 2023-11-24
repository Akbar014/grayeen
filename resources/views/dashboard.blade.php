@extends('admin.master')
@section('title') Home @endsection
@section('dashboard') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Greyscape</a>
        <span class="breadcrumb-item active">Dashboard</span>
        <!-- BASIC MODAL -->
    
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 mt-2" style="background: #0f2027;background: -webkit-linear-gradient(to right, #0f2027, #203a43, #2c5364);
                        background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Projects</h6>
                        <span href="#" class="tx-white-8 hover-white">{{$projects->count();}}</span>
                    </div>
                    <!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                        <!-- <h3 class="mg-b-0 tx-white tx-lato tx-bold">fdghdfgdf</h3> -->
                        <a href="" class="btn btn-success btn-sm rounded">Report</a>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col-3 -->
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-secondary mt-2">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Project Images</h6>
                        <a href="" class="tx-white-8 hover-white">{{$projectimages->count();}}</a>
                    </div>
                    <!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col-3 -->
            <div class="col-sm-6 col-xl-3 ">
                <div class="card pd-20 bg-success mt-2">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Slider </h6>
                        <span href="#" class="tx-white-8 hover-white">{{$sliders->count();}}</span>
                    </div>
                    <!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col-3 -->
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-warning mt-2">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Categories</h6>
                        <a href="" class="tx-white-8 hover-white">{{$categories->count();}}</a>
                    </div>
                    <!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col-3 -->
        </div>
        <!-- row -->
    </div>

    
    <!-- sl-pagebody -->
    <div class="row">
        <div class="sl-pagebody col-md-12">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <div>
                    <canvas id="myChart" style="width: 800px; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection