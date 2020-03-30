@inject('news', 'App\News')    

    @include('front.layouts.header')
<body>
    @include('front.layouts.nav1')
    @include('front.layouts.nav2')
        @include('front.layouts.nav3')

    
                <div id="page-preloader" class="visible">
                    <div class="preloader">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                        </div>
                    </div>
                </div>
                <div id="common-home" class="container">
                    <div class="row">
                        <div id="content" class="col-sm-12">
                            {{-- // slider --}}
                            @include('front.layouts.slider')
                            <div>
                                <div class="service">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <ul class="list-inline">
                                                    <li class="del1"><svg width="40px" height="40px"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#gift"></use> </svg></li>
                                                    <li class="se1 text-xs-left">
                                                        <h4>special gift cards</h4>
                                                        <p>give a perfect gift</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <ul class="sborder list-inline">
                                                    <li class="del4"><svg width="40px" height="40px"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pay"></use> </svg></li>
                                                    <li class="se1  text-xs-left">
                                                        <h4>secure payment</h4>
                                                        <p>100% secure payment</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <ul class="sborder list-inline">
                                                    <li class="del2"><svg width="40px" height="40px"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#support"></use> </svg></li>
                                                    <li class="se1  text-xs-left">
                                                        <h4>24/7 support</h4>
                                                        <p>online support 24/7</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @include('front.welcome.featuresslider')
                            @include('front.welcome.viewsslider')
                            @include('front.welcome.latestsslider')

                            <div class="offerbanner">
                                <a href="#">
                                    <img src="{{url('/front')}}/image/cache/catalog/offerbanner/banner.jpeg" alt="banner" class="img-responsive" />
                                </a>
                                <p class="inspire_offer_hover">
                                    <a class="bannerzoomicon" title="Click to view Full Image " href="{{url('/front')}}/image/cache/catalog/offerbanner/banner.jpeg" data-lightbox="example-set"></a>
                                </p>

                            </div>

                            <div class="row welcome-msg">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <a href="{{asset('images\about-us.png')}}"><img src="{{asset('images\about-us.png')}}" alt="about-us"></a>    
                                    </div>
                                
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <p>{!!$setting->welcome_msg!!}</p>
                                    </div>
                            </div>

                            <div class="row ">
                                    @foreach ($news->take(2)->get() as $new)
                                    <div class="col-lg-6 col-md-6 col-xs-12 welcome-msg">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <a href="{{url('fronts/news'.'/'.$new->id)}}">
                                            <img src="{{url('/uploads/thumbs').'/'.$new->images[0]['source']}}" alt="History of 1984" title="History of 1984" class="img-responsive"/>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <h1 class="title">{!!$new->title!!}</h1>
                                        <p>{!!substr(strip_tags($new->description),1,250)!!}</p>
                                    </div>
                                    </div>
                                    @endforeach
                            </div>
                            
                            {{-- @include('front.layouts.news') --}}
                            

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#carousel0").owlCarousel({
                                        itemsCustom: [
                                            [0, 2],
                                            [600, 4],
                                            [768, 5],
                                            [992, 5],
                                            [1200, 6]
                                        ],
                                        autoPlay: 2500,
                                        loop: true,
                                        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                                        navigation: false,
                                        pagination: false
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                @include('front.layouts.footer')
                <a href="#" id="scroll" title="Scroll to Top" style="display: block;">
                    <i class="fa fa-angle-up"></i>
                </a>


                <!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
    </body>
    <!-- Mirrored from templatetasarim.com/opencart/Books/ by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 26 Feb 2020 10:16:42 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <!-- /Added by HTTrack -->

    </html>