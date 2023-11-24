@extends('frontend.master')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 slider" src="{{ asset('images/'.$category->image) }}" alt="First slide">
            <div class="carousel-caption d-flex align-items-center justify-content-center">
                <div class="opacity color2" style="margin-top: 200px;"></div>
                <div class="banner-align full-h">
                    <div class="container" style="margin-top: 200px;">
                        <div class="row">
                            <div class="col-12 col-xl-8 offset-xl-2">
                                <div class="banner-content text-center animate-banner-content">
                                    <!-- <div class="motto-text color2">WE ARE MOA</div>
                                    <h1 class="h1 title color2">Pioneering Garden Studios</h1> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
    <h3 class="bg-dark text-center text-light" ">{{$category->cname}} Projects ggf</h3>
    </div>
</div>       
<div class="container">
<div class=" row">
        @foreach($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div id="carouselExampleIndicators{{$project->id}}" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = 0; ?>
                        @foreach($project->images as $data)
                        <li data-target="#carouselExampleIndicators{{$project->id}}" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
                        <?php $i++; ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        <?php $i = 0; ?>
                        @foreach($project->images as $data)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }} ">
                            <a href="{{route('projectDetails',$project->id)}}"><img class="d-block w-100 " style="height:200px;" src="{{asset('images/'. $data->image)}}"  alt="Slide {{ $i }}" ></a>
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                            <span class="image-number">{{$i+1}}/{{$loop->count}}</span>
                        </div>
                        <?php $i++; ?>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{$project->id}}" role="button" data-slide="prev">
                        <!--<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators{{$project->id}}" role="button" data-slide="next">
                        <!--<span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center bg-dark text-light">{{$project->ptitle}}</h5>
                    <p class="card-text  truncate-3-lines text-justify">{{$project->pdescription}}</p>
                    <div class="col text-center">
                        <a href="{{route('projectDetails',$project->id)}}" class=" btn-sm btn-success btn-center">View details </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
</div>
<script>
    function openFullscreen(images, index) {
        const img = images[index];
        if (img.requestFullscreen) {
            img.requestFullscreen();
        } else if (img.webkitRequestFullscreen) {
            /* Safari */
            img.webkitRequestFullscreen();
        } else if (img.msRequestFullscreen) {
            /* IE11 */
            img.msRequestFullscreen();
        }

        const updateCarousel = (direction) => {
            const currentIndex = index;
            let nextIndex = direction === "previous" ? currentIndex - 1 : currentIndex + 1;
            if (nextIndex < 0) {
                nextIndex = images.length - 1;
            } else if (nextIndex >= images.length) {
                nextIndex = 0;
            }
            const carouselId = `#carouselExampleIndicators${currentIndex}`;
            $(carouselId).carousel(nextIndex);
        };

        $('.carousel-control-prev').on('click', function() {
            updateCarousel("previous");
        });

        $('.carousel-control-next').on('click', function() {
            updateCarousel("next");
        });
    }
</script>
<style>
    .image-number {
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 4px 10px;
        font-size: 14px;
        border-radius: 5px;
    }
</style>
@endsection