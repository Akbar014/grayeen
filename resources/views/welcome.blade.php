@extends('frontend.master')
@section('content')
<div class="section banner home-banner ">
    <div id="carouselExampleIndicators" class="carousel slider" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $i = 0; ?>
            @foreach($slider as $item)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
            <?php $i++; ?>
            @endforeach
        </ol>
        <div class="carousel-inner ">
            <?php $i = 0; ?>
            @foreach($slider as $item)
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }} ">
                <img class="d-block w-100 slider" src="{{asset('images/'.$item->image)}}" alt="Slide {{ $i }}">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="opacity color2 " style="margin-top: 200px;"></div>
                    <div class="banner-align full-h">
                        <div class="container" style="margin-top: 170px;">
                            <div class="row">
                                <div class="col-12 col-xl-8 offset-xl-2">
                                    <div class="banner-content text-center animate-banner-content">

                                        <h1 class="h1 title color2">{{$item->description}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach
        </div>
    </div>
    <div class="scroll-to btn-link arrow-bottom" data-scroll-to="1">
        <!-- <h5 text-light>This is Grey Scape </h5> -->
        <!-- See Our Process -->
    </div>
</div>
<div class="section section-padd section-count sec-bg-color scroll-to-block" id="about" data-scroll-block="1" style="background-image: url({{asset('img/resized.jpg')}});
background-size:cover;">
    <div class="container">
        <div class="row">
            @foreach($about as $data)
            <div class="col-12 col-md-6">
                <div class="left-right-img animate-img-bg animate-img animate-item">
                    <div class="img-mask">
                        <img src="{{asset('images/' .$data->image)}}" alt="">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 col-md-6 align-self-center">
                <div class="content-block left-right-content animate-content animate-item">
                    <!-- <div class="number-project"></div> -->
                    <div class="title h2">About Us </div>
                    <div class="text">
                        <p>{{$data->description}} </p>
                    </div>
                    <!-- <a href="contact/index.htm" class="btn-link">Make inquiries →</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-padd section-count sec-bg-color scroll-to-block" id="about1" data-scroll-block="1" >
    <div class="container">
        @if($project1)
        <div class="row">
            
            <div class="col-12 col-md-6 align-self-center">
                <div class="content-block left-right-content animate-content animate-item">
                    <!-- <div class="number-project"></div> -->
                    <div class="title h2">{{$project1->ptitle }} </div>
                    <div class="text">
                        <p>{{$project1->pdescription}} </p>
                    </div>
                    <a href="{{route('projectDetails',$project1->id)}}" class="btn-link">Project Details →</a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="left-right-img animate-img-bg animate-img animate-item">
                    <div class="img-mask">
                        <img src="{{asset('images/' .$project1->images->first()->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="section section-padd section-count sec-bg-color scroll-to-block" id="about1" data-scroll-block="1" >
    <div class="container">
        @if($project2)
        <div class="row">
            
            <div class="col-12 col-md-6 align-self-center custom ">
                <div class="left-right-img animate-img-bg animate-img animate-item">
                    <div class="img-mask">
                        <img src="{{asset('images/' .$project2->images->first()->image)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                
                <div class="content-block left-right-content animate-content animate-item">
                    <!-- <div class="number-project"></div> -->
                    <div class="title h2">{{$project2->ptitle }} </div>
                    <div class="text">
                        <p>{{$project2->pdescription}} </p>
                    </div>
                    <a href="{{route('projectDetails',$project2->id)}}" class="btn-link">Project Details →</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>



<div class="section section-padd section-count sec-bg-color scroll-to-block" id="about3" data-scroll-block="1">
    <div class="container">
        @if($project3)
        <div class="row">
            <div class="col-12 col-md-6 align-self-center">
                <div class="content-block left-right-content animate-content animate-item">
                    <!-- <div class="number-project"></div> -->
                    <div class="title h2">{{$project3->ptitle }}  </div>
                    <div class="text">
                        <p> {{$project3->pdescription}} </p>
                    </div>
                    <a href="{{route('projectDetails',$project3->id)}}" class="btn-link">Project Details →</a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="left-right-img animate-img-bg animate-img animate-item">
                    <div class="img-mask">
                        <img src="{{asset('images/' .$project3->images->first()->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        @endif 
    </div>
</div>

<div class="section section-padd sec-bg-color2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-block text-center animate-content animate-item">
                    <div class="motto-text style1 size2">Happy Customers</div>
                    <div class="h2 title">Our Projects</div>
                </div>
                <!-- <div class="spacer-lg"></div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-8 offset-xl-2">
                <div class="swiper-entry simple-slider animate-content animate-item">
                    <div class="swiper-button-prev"><i></i></div>
                    <div class="swiper-button-next"><i></i></div>
                    <div class="swiper-container" data-options='{"autoplay": { "delay": 7000 }, "parallax": true, "loop":true, "centerInsufficientSlides": true, "spaceBetween": 30, "autoHeight": true}'>
                        <div class="swiper-wrapper">
                            @foreach($projects as $data )
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="photo-block">
                                        <span class="bg" data-swiper-parallax="30%" style="background-image: url('{{ asset('images/'.$data->images->first()->image) }}');"></span>
                                    </div>
                                    <div class="testimonial-text-block">
                                        <img src="wp-content/themes/moa/img/quotation.svg" alt="">
                                        <div class="text text-sm color-2 ">
                                            <p class="truncate-3-lines text-justify">{{$data->pdescription}}</p>
                                        </div>
                                        <div class="title h4 color2 author">{{$data->pclient}}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination swiper-pagination-relative"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection