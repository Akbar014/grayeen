@extends('frontend.master')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 slider" src="{{ asset('images/'.$project->images->first()->image) }}" alt="First slide">
            <div class="carousel-caption d-flex align-items-center justify-content-center">
                <div class="opacity color2" style="margin-top: 200px;"></div>
                <div class="banner-align full-h">
                    <div class="container" style="margin-top: 200px;">
                        <div class="row">
                            <div class="col-12 col-xl-8 offset-xl-2">
                                <div class="banner-content text-center animate-banner-content">
                                    <!--<div class="motto-text color2">WE ARE Greyscape</div>-->
                                    <h1 class="h1 title color2">{{$project->ptitle}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class=" row">
        <div class="col-lg-6">
            <ul class="list-group mt-2">
                <li class="list-group-item d-flex justify-content-between align-items-center listcustom text-info">
                    Project Information
                    <span class=""> </span>
                </li>
                @if($project->pclient)
                <li class="list-group-item d-flex justify-content-between align-items-center listcustom">
                    Client Name -
                    <span class="">{{$project->pclient}} </span>
                </li>
                @endif
                @if($project->plocation)
                <li class="list-group-item d-flex justify-content-between align-items-center listcustom">
                    Location
                    <span class="">{{$project->plocation}}</span>
                </li>
                @endif
                @if($project->tba)
                <li class="list-group-item d-flex justify-content-between align-items-center listcustom">
                    Total Build Area
                    <span class="">{{$project->tba}}</span>
                </li>
                @endif
                @if($project->land_area)
                <li class="list-group-item d-flex justify-content-between align-items-center listcustom">
                    Land Area
                    <span class="">{{$project->land_area}}</span>
                </li>
                @endif
                @if($project->period)
                <li class="list-group-item d-flex justify-content-between align-items-center listcustom">
                    Period
                    <span class="">{{$project->period}}</span>
                </li>
                @endif
            </ul>
            @if($project->design_team)
            <li class="list-group-item d-flex justify-content-between align-items-center listcustom">
                Design team
                <span class="">{{$project->design_team}}</span>
            </li>
            @endif
            </ul>
        </div>
        <div class="col-lg-6 ">
            <div class="card mt-2">
                <div class="card-header listcustom text-info">
                    Project description
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0 " style="font-size: 14px;">
                        <p class="text-justify">{{$project->pdescription}}</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        @foreach($projectimage as $data)
        <div class="col-lg-4 mt-4">
            <a class="lightbox img-mask " href="{{ asset('images/' . $data->image) }}" data-fancybox="gallery" data-caption="">
                <img src="{{ asset('images/' . $data->image) }}" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="row mt-5 mb-5 d-flex justify-content-center">
    <iframe width="650" height="315" src="{{$project->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
@endsection