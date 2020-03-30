<footer>

    <div class="foot-top">
        <div class="container">
            <div class="inspire-newsletter  inspire-newsletter">
                <form id="formNewLestter" method="post" class="formNewLestter newsletter-bg">
                    <div class="inner row">
                        <div class="col-sm-5 col-xs-12 hidden-xs pull-right text-right">
                                <i class="fas fa-envelope-open-text"></i>

                            <div class="description-top">
                            <h3>{{__('القائمة البريدية')}}</h3>
                                <p>{{__('من فضلك ادخل البيانات المطلوبه')}}</p>
                            </div>
                        </div>
                        <div class="col-sm-7 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-md inputNew text-right" onblur="javascript:if(this.value=='')this.value='بريدك الالكترونى';" onfocus="javascript:if(this.value=='بريدك الالكترونى')this.value='';" value="بريدك الالكترونى" size="18" name="email">
                            </div>
                            <div class="button-submit">
                            <button type="submit" name="submitNewsletter" class="btn btn-danger">{{__('ارسال')}}</button>
                            </div>
                            <input type="hidden" value="1" name="action">
                            <div class="valid"></div>
                            <div class="description-bottom">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <script type="text/javascript">
                <!--
                $("#newsletter_1582557725").inspireoNewsletter().work('Email is not valid!');
                -->
            </script>
        </div>
    </div>
    <div class="container">
        <div class="row text-right">


            <aside id="column-left1" class="col-lg-3 col-sm-3 pull-right">
                <div>
                <h5><span>{{__('اتصل بنا')}}</span>
                        <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#contact"></button>
                    </h5>
                    <div id="contact" class="collapse footer-collapse footcontact">
                        <ul class="list-unstyled f-left">
                        <li><i class="fa fa-map-marker"></i>{{$setting->address}}</li>
                        <li><i class="fa fa-envelope"></i>{{$setting->email}}</li>
                            <li><i class="fa fa-phone"></i>{{$setting->phone}} , {{$setting->mobile}}</li>
                            <li><i class="fa fa-paper-plane"></i>Egypt</li>
                        </ul>
                        <ul class="list-inline list-unstyled foot-social">
                            <li><a href="{{$setting->facebook}}" target="blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$setting->instagram}}" target="blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$setting->twitter}}" target="blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$setting->youtube}}" target="blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

            </aside>

            <div class="middle-footer">
               
                <div class="col-lg-3 col-sm-3 pull-right">
                    <h5>{{__('معلومات')}}
                        <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#info"></button>
                    </h5>
                    <div id="info" class="collapse footer-collapse">
                        <ul class="list-unstyled">
                            
                            <li><a href="index9328.html?route=common/home">{{__('الاخبار')}}</a></li>
                            <li><a href="index9328.html?route=common/home">{{__('التوزيعات')}}</a></li>
                            <li><a href="index9328.html?route=common/home">{{__('منافذ توزيع')}}</a></li>
                            <li><a href="index9328.html?route=common/home">{{__('انشر كتابك')}}</a></li>
                            <li><a href="index9328.html?route=common/home">{{__('قائمه الكتب')}}</a></li>
                            <li><a href="index9328.html?route=common/home">{{__('اكثر مشاهده')}}</a></li>
                            <li><a href="index9328.html?route=common/home">{{__('الكتب المختاره')}}</a></li>
                        </ul>
                    </div>
                </div>               
                <div class="col-lg-6 col-sm-3 pull-left">
                    <h5>{{__('التصنيفات')}}
                        <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#info"></button>
                    </h5>
                    <div id="info" class="collapse footer-collapse">
                        <ul class="list-unstyled">
                            <div class="col-lg-3">
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                            </div>
                            <div class="col-lg-3">
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                            </div>
                            <div class="col-lg-3">
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                            </div>
                            <div class="col-lg-3">
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                                <li><a href="index9328.html?route=common/home">{{__('تصنيف ')}}</a></li>
                            </div>

                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="xs-fab">

                    </div>
                </div>
            </div>

            <!--   -->
        </div>
        <div class="foot-bottom">
            <div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="foot-app">
                            <div class="title-footer hidden-md hidden-sm hidden-xs">Download Our App</div>
                            <ul class="list-unstyled inline-block footer-payment">
                                <li>
                                    <a title="AppStore" href="#"><img class="img-responsive" src="{{url('/front')}}/image/catalog/app1.png" alt="App Store"></a>
                                </li>
                                <li>
                                    <a title="PlayStore" href="#"><img class="img-responsive" src="{{url('/front')}}/image/catalog/app2.png" alt="Play Store"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-social">
                        <div class="text-right">
                            <img class="img-responsive" src="{{url('/front')}}/image/catalog/payment.png" alt="imgpayment">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="foot-power">
        <div class="container">
            <div class="copy text-center">Powered By <a href="http://www.opencart.com/">OpenCart</a> Shoppee Store &copy; 2020</div>
        </div>
    </div>
</footer>