<div class="row">
    <div class="col-md-3 col-sm-4 pull-right"></div>
    <div class="col-md-6 col-sm-8 slide-padding pull-right">
        <div class="homeslide">
            <div id="slideshow0" class="owl-carousel owl-theme">
                <div class="text-center">
                    <a href="#"><img src="{{url('/front')}}/image/cache/catalog/slider/584X500-1-584x500.jpg" alt="slider" class="img-responsive" /></a>
                </div>
                <div class="text-center">
                    <a href="#"><img src="{{url('/front')}}/image/cache/catalog/slider/584X500-2-584x500.jpg" alt="MenuFacturer" class="img-responsive" /></a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#slideshow0").owlCarousel({
                itemsCustom: [
                    [0, 1]
                ],
                autoPlay: 2500,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                loop: true,
                navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                navigation: false,
                pagination: true
            });
        });
    </script>
    <div class="col-md-3 rightbanner hidden-xs hidden-sm pull-left">
        <div class=" banner-effect">
            <a href="{{url('fronts/book/{id}')}}">
                <img src="{{url('/front')}}/image/cache/catalog/right-banner/1.jpeg" alt="banner" class="img-responsive" />
            </a>
        </div>
        <div class=" banner-effect">
            <a href="{{url('fronts/book/{id}')}}">
                <img src="{{url('/front')}}/image/cache/catalog/right-banner/2.jpeg" alt="banner" class="img-responsive" />
            </a>
        </div>
        <div class=" banner-effect">
            <a href="{{url('fronts/book/{id}')}}">
                <img src="{{url('/front')}}/image/cache/catalog/right-banner/3.jpeg" alt="banner" class="img-responsive" />
            </a>
        </div>
    </div>


</div>