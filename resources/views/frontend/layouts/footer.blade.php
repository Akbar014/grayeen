<div class="section contact-sec" id="contact">
    @foreach($contact as $data )
    <div class="bg" style="background-image:url('{{ asset('images/'.$data->image) }}');">
    </div>
    <div class="opacity color2"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 offset-xl-2">
                <div class="content-block text-center animate-content animate-item">
                    <div class="motto-text color2">CONTACT</div>
                    <div class="h2 title color2">{{$data->description}}</div>
                    <!-- <a href="book-a-free-consultation/index.htm" class="btn">book a free consultation</a>
                                <a href="" class="btn btn-sm btn-secondery btn-center">book a free consultation </a> -->
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="footer-top">
    <div class="container">
        <div class="row">
        </div>
        <div class="row row-info">
            <div class="col-12 col-lg-3 d-none d-lg-block">
                <div class="footer-text">
                    <div class="title h4 color2">
                        <img src="{{asset('frontend/logo/logo.png')}}" alt="" style="width: 82%;">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="footer-item">
                    <div class="footer-info">
                        @foreach($contact as $data )
                        <div class="caption text-dark">GREYSCAPE STUDIO <br> MYMENSINGH </div>
                        <div class="text text-dark">
                            <p style="color:#455A47">
                                <b> Address : </b> {{$data->address2}}
                            </p>
                        </div>
                        <div class="tel">
                            <span><a href="tel:3530906406275" style="color:#455A47"> <b>Phone No :</b>{{$data->phone1}}</a></span>
                        </div>
                        <div class="mail">
                            <a href="mailto:{{$data->mail}}" style="color:#455A47"> <b> Email : </b>{{$data->mail1}}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="footer-info">
                        <div class="caption text-dark">GREYSCAPE STUDIO <br> DHAKA</div>
                        <div class="text text-dark">
                            <p style="color:#455A47">
                                <b> Address : </b> {{$data->address2}}
                            </p>
                        </div>
                        <div class="tel">
                            <span><a href="tel:3530906406275" style="color:#455A47"> <b>Phone No :</b>{{$data->phone2}}</a></span>
                        </div>
                        <div class="mail">
                            <a href="mailto:{{$data->mail}}" style="color:#455A47"> <b> Email : </b>{{$data->mail2}}</a>
                        </div>
                    </div>
                    <div class="footer-info">
                        <div class="caption text-dark">Pages</div>
                        <div class="footer-link ">
                            <div class="menu-footer-menu-container">
                                <ul id="menu-footer-menu" class="menu text-dark">
                                    <li><a href="" class="text-dark">Home </a></li>
                                    <li><a href="" class="text-dark">Projects </a></li>
                                    <li><a href="" class="text-dark">About Us </a></li>
                                    <li><a href="" class="text-dark">Contact </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-info">
                        <div class="caption text-dark">Social media</div>
                        <div class="footer-link">
                            <ul>
                                <li><a class="text-dark" href="https://www.facebook.com/greyscape.architects" target="_blank">Facebook</a></li>
                                <li><a class="text-dark" href="https://www.instagram.com/moa_modular/" target="_blank">Instagram</a></li>
                                <li><a class="text-dark" href="https://www.linkedin.com/" target="_blank">Linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>