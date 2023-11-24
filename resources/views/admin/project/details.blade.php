@extends('admin.master')
@section('title') Projects Add @endsection
@section('project') active show-sub @endsection
@section('projects.list') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <a class="breadcrumb-item" href="{{ url('/projects') }}">Project</a>
        <a class="breadcrumb-item" href="{{ url('/projects') }}">All Projects</a>
        <span class="breadcrumb-item active">Project Details</span>


    </nav>

    <!-- <button>Edit </button> -->
    <h1 class="text-center text-capitalize">{{$project->ptitle}}</h1>
    <button class="ml-2"><a class="text-info float-right" href="{{route('projects.edit',$project->id)}}"><i class="fa fa-edit text-info"></i> </a></button>

    <div class="sl-pagebody">

        <div class="row row-sm">
            @if(Session::get('message'))
            <p class="text-success pl-1">{{ Session::get('message') }}</p>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project Information</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if($project->pclient)
                    <tr class="bg-light">
                        <th scope="row">Client Name</th>
                        <td class="text-dark font-weight-bold"></td>
                        <td></td>
                        <td class="text-dark">{{$project->pclient}}</td>
                    </tr>
                    @endif

                    @if($project->plocation)
                    <tr>
                        <th scope="row"> Location</th>
                        <td class="text-dark font-weight-bold"></td>
                        <td></td>
                        <td class="text-dark">{{$project->plocation}}</td>
                    </tr>
                    @endif

                    @if($project->tba)
                    <tr class="bg-light">
                        <th scope="row">Total Build Area</th>
                        <td class="text-dark font-weight-bold"> </td>
                        <td></td>
                        <td class="text-dark">{{$project->tba}}</td>
                    </tr>
                    @endif

                    @if($project->plocation)
                    <tr>
                        <th scope="row">Client Name</th>
                        <td class="text-dark font-weight-bold"> </td>
                        <td></td>
                        <td class="text-dark">{{$project->plocation}}</td>
                    </tr>
                    @endif

                    @if($project->land_area)
                    <tr class="bg-light">
                        <th scope="row">Land Area</th>
                        <td class="text-dark font-weight-bold"> </td>
                        <td></td>
                        <td class="text-dark">{{$project->land_area}}</td>
                    </tr>
                    @endif

                    @if($project->period)
                    <tr>
                        <th scope="row">Period</th>
                        <td class="text-dark font-weight-bold"> </td>
                        <td></td>
                        <td class="text-dark">{{$project->period }}</td>
                    </tr>
                    @endif

                    @if($project->design_team)
                    <tr class="bg-light">
                        <th scope="row">Design Team </th>
                        <td class="text-dark font-weight-bold"> </td>
                        <td></td>
                        <td class="text-dark">{{$project->design_team }}</td>
                    </tr>
                    @endif


                </tbody>
            </table>


        </div>

        <div class="row row-sm">
            <label for="" class="text-dark font-weight-bold">Description</label>
            <p class="bg-light">{{$project->pdescription}}</p>
        </div>

        <!-- row -->

    </div>

    <!-- sl-pagebody -->

    <!-- 2nd sl pagebody -->
    <div class="sl-pagebody">
        <div class="row row-sm">
            @foreach($project->images as $data)
            <div class="col-sm-6 col-xl-3 p-2">
                <div class="card bd-0">
                    <img class="card-img img-fluid" src="{{asset('images/'.$data->image)}}" alt="Image">
                    <div class="card-img-overlay pd-30 d-flex align-items-start flex-column">
                    </div>
                </div>
                <!-- card -->
            </div>

            @endforeach
        </div>
        <!-- row -->
        


    </div>

    <div class="sl-pagebody">
            <div class="row">
                <div class="col-md-6">
                    <h1>Project video </h1>
                    <iframe src="{{$project->video}}" title="Greyscape videos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    <!-- 2nd sl pagebody -->


</div>






@endsection