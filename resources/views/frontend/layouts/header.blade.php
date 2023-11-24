<nav class="navbar header navbar-expand-lg navbar-light bg-light">
    <img src="{{asset('frontend/logo/logo.png')}}" style="height: 80px; width: auto;" class="logo d-flex justify-content-start">
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white ; border:1px solid black;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav menuposition">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link text-light" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('projects*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Projects
                </a>
                <div class="dropdown-menu dropdown-menu-custom " aria-labelledby="navbarDropdown">
                    @foreach($categories as $data)
                    <a class="dropdown-item text-dark" href="{{route('cat-project',$data->id)}}">{{$data->cname}}</a>

                    @endforeach
                </div>
            </li>
            
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link text-light " href="{{ url('/') }}#about">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link text-light " href="{{ url('/') }}#contact">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav socialmedia" style="margin-left:150px;">
            <li class="nav-item ">
                <a class="nav-link " href="#"><img class="icon" src="{{asset('frontend/icons/facebook.png')}}" alt="" style=""> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#"><img class="icon" src="{{asset('frontend/icons/instagram.png')}}" alt="" style="height: 30px;width: 30px;"> <span class="sr-only"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#"><img class="icon" src="{{asset('frontend/icons/pinterest.png')}}" alt="" style="height: 30px;width: 30px;"> <span class="sr-only"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img class="icon" src="{{asset('frontend/icons/whatsapp.png')}}" alt="" style="height: 30px;width: 30px;"> <span class="sr-only"></a>
            </li>
        </ul>
    </div>
</nav>