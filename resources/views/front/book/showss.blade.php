@inject('books', 'App\Book')    

@extends('front.index')
@section('content')
<div id="product-product" class="container common-shed">
    <div class="row">
                  <div id="content" class="col-sm-12">
                    <ul class="breadcrumb"   style="width: 75%">
                        <li><a href="{{url('fronts/welcome')}}">الرئيسيه</a></li>
                        @if($record->category->parent_id > 0)
                        <li><a href="">{{$cats->where('id', $record->category->parent_id)->pluck('name')[0]}}</a></li>
                        @endif
                        <li><a href="">{{$record->category->name}}</a></li>
                        <li><a href="">{{$record->name}}</a></li>
                               </ul>
        <div class="">
          <div class="col-md-12 col-sm-12 inspire-form-bg">
                                  <div class="col-md-5 col-sm-6 proimg"> 
                                    <ul class="thumbnails">
                                        <li class="img_thumb"><a class="thumbnail" href="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" title="{{$record->name}}">
                                             <img data-zoom-image="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" src="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" id="inspzoom" class="img-responsive center-block" alt="image">
                                        </a>
                                    </li>
                                                                                            <div class="row">
                                    <li id="additional" class="owl-carousel">
                                            <a data-zoom-image="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" data-image="{{asset('/uploads').'/'.$record->cover_img}}"  href="{{asset('/uploads').'/'.$record->cover_img}}">
                                            <img src="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" class="img-responsive center-block col-xs-12" alt="additional image">
                                        </a>
                                      
                                            <a data-zoom-image="{{asset('/uploads').'/'.$record->back_img}}" data-image="{{asset('/uploads').'/'.$record->back_img}}"  href="{{asset('/uploads').'/'.$record->back_img}}">
                                            <img src="{{asset('/uploads/thumbs').'/'.$record->back_img}}" class="img-responsive center-block col-xs-12" alt="additional image">
                                        </a>
                                                                    </li>
                                    </div>
                                                            </ul>
                    </div>
                                  <div class="col-md-7 col-sm-6 product-right">
            <!--product Details Start -->
            <div class="col-md-6 xspro">
                <h1>{{$record->name}}</h1>
                <hr class="prosp">
                <ul class="list-unstyled">
                <li>{{$record->isbn}}<span class="text-prodecor">رقم الكتاب</span></li>
                <li>{{$record->author}}<span class="text-prodecor">المؤلف</span></li><br>
                <li>$ {{$record->price}}<span class="text-prodecor">السعر</span></li>
                            </ul>
              <div id="product">                         <!-- Quantity option -->
                <form action="{{route('items.store')}}" method="POST">

              <div class="form-group">
              <div class="row">
                  <div class="col-sm-2 col-md-2 col-xs-2 op-box qtlabel">
                      <label class="control-label text-prodecorop" for="input-quantity">الكميه</label>
                  </div>
                <div class="col-md-10 col-sm-10 col-xs-10 op-box qty-plus-minus">
                <button type="button" class="form-control pull-left btn-number btnminus" disabled="disabled" data-type="minus" data-field="quantity">
                    <span class="glyphicon glyphicon-minus"></span>
                 </button>
                <input id="input-quantity" type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control input-number pull-left" />
                <input type="hidden" name="book_id" value="{{$record->id}}" />
                 <button type="button" class="form-control pull-left btn-number btnplus" data-type="plus" data-field="quantity">
                    <span class="glyphicon glyphicon-plus"></span>
                 </button>
                 </div>
                 </div><hr class="prosp">
                <button type="button" id="button-cart" data-loading-text="Loading..." class="btn add-to-cart btn-primary">اضف للعربه</button>
               <button type="button" data-toggle="tooltip" title="Add to Wish List" class="btn add-to-cart btn-primary" onclick="wishlist.add({{$record->id}});"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" class="btn add-to-cart btn-primary" onclick="compare.add({{$record->id}});" ><i class="fa fa-compress"></i></button>
                <hr class="prosp">
              </div>
            </form>                      

              <!-- Quantity option end -->
              </div>
            </div>
            <!--product Details End -->
            <div class="col-md-6 p-p-price-detail">
              <div>Availability: <span class="in-stock">In Stock</span></div>
                         <ul class="list-unstyled price-desc">
                          <!-- <li><span style="text-decoration: line-through;">$23,500.00</span></li> -->
              <li class="text-prodecor-bold">
                <h2 class="pro-price">$1,000.00</h2>
              </li>
                                       <li>Ex Tax: $1,000.00</li>
               
                                    </ul>
                                 <div class="rating">
              <ul class="list-inline">
              <li class="prodrate">              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>               </li>
                <li class="proreviewre">
                  <a id="pro-review" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a>
                </li>
                <li class="prowritere">
                  <a id="pro-writereview" href="#rt" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
                </li>
                </ul>
              <hr class="prosp">
               <!-- AddToAny BEGIN -->
                          <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                              <a class="a2a_button_facebook"></a>
                              <a class="a2a_button_twitter"></a>
                              <a class="a2a_button_google_plus"></a>
                              <a class="a2a_button_pinterest"></a>
                              <a class="a2a_button_linkedin"></a>
                              <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                          </div>
                          <script async src="../../../static.addtoany.com/menu/page.js"></script>
              <!-- AddToAny END -->
            </div>
             
            </div>                             
            
           
          </div>
        </div>
        </div>
  <div class="propage-tab">
        <ul class="nav nav-tabs">
              
              <li class="active"><a href="#tab-specification" data-toggle="tab">Specification</a></li>
             
              <li><a href="#tab-description" data-toggle="tab">Description</a></li>            
                          <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
                        </ul>
            <div class="tab-content">
                           <div class="tab-pane" id="tab-description"><div><div class="_2THx53"><b>Awesome Colors</b></div><div class="_1aK10F"><p>Is
   grass always greener on the other side? It’s definitely true for this 
  Samsung TV. Thanks to Samsung’s Wide Color Enhancer technology, your 
  grass becomes greener, skies bluer and roses redder.</p>
  </div></div><p><br></p><div class="_38NXIU"><div class="_3LyGPp _2briKY"><div><div><div class="Pk2voS _8Uh6-B _2SuWq2"><img src="https://rukminim1.flixcart.com/image/200/200/television/z/b/6/samsung-32j4003-400x400-imaemhvfmr5nsnf2.jpeg?q=90" style="max-width:100%;vertical-align:middle"></div><div class="Pk2voS _8Uh6-B _2SuWq2"><br></div><div><div class="_2THx53"><b>Live it up in High Definition</b></div><div class="_1aK10F"><p>This
   TV comes with an HD Ready resolution of 1366x768 pixels, which is more 
  than sufficient for a cinematic experience. You also get an HDMI port to
   ensure that high quality content can be transferred seamlessly from a 
  multiple range of devices.</p>
  </div></div></div></div></div></div><p><br></p><div class="_38NXIU"><div class="_3LyGPp _2briKY"><div><div><div class="Pk2voS _2XGBfy _2SuWq2"><img src="https://rukminim1.flixcart.com/image/200/200/j5ihlzk0/television/z/b/6/samsung-32j4003-400x400-imaew6js7hgyfhss.jpeg?q=90" style="max-width:100%;vertical-align:middle"></div><div class="Pk2voS _2XGBfy _2SuWq2"><br></div><div><div class="_2THx53"><b>Ahoy, USB</b></div><div class="_1aK10F"><p>Got
   a pen drive or hard disk chock full of movies and photos? Well, now you
   can just plug it into the USB port of this TV and enjoy the content on 
  the big screen. You don’t even have to worry about any complicated setup
   procedure.</p>
  </div></div></div></div></div></div><p><br></p><div class="_38NXIU"><div class="_3LyGPp _2briKY"><div><div><div class="Pk2voS _8Uh6-B _2SuWq2"><img src="https://rukminim1.flixcart.com/image/200/200/j5ihlzk0/television/z/b/6/samsung-32j4003-400x400-imaew6n7cfket3dz.jpeg?q=90" style="max-width:100%;vertical-align:middle"></div><div class="Pk2voS _8Uh6-B _2SuWq2"><br></div><div><div class="_2THx53"><b>Turn it up</b></div><div class="_1aK10F"><p>This
   Samsung TV comes with two speakers, both of which offer 10 W of audio 
  output. It also boasts Dolby Digital Plus technology. So, it doesn’t 
  matter what you are watching, you can be absolutely sure that you’re not
   going to miss out on any detail, whether it’s a important piece of 
  dialogue or a super-cool explosion.</p>
  </div></div></div></div></div></div><p><br></p><div class="_38NXIU"><div class="_3LyGPp _2briKY"><div><div><div class="Pk2voS _2XGBfy _2SuWq2"><img src="https://rukminim1.flixcart.com/image/200/200/j5ihlzk0/television/z/b/6/samsung-32j4003-400x400-imaew6n7p4ct3g4z.jpeg?q=90" style="max-width:100%;vertical-align:middle"></div><div class="Pk2voS _2XGBfy _2SuWq2"><br></div><div><div class="_2THx53"><b>For the Love of Sport</b></div><div class="_1aK10F"><p>Why
   stick to standard when you can get a customized better experience? For 
  instance, this TV comes with a special mode for sports. Well, what does 
  this mode do – you ask? Imagine watching your favorite team play on the 
  screen when you feel like you are right there in the stadium. Yeah, 
  that’s it.</p>
  </div></div></div></div></div></div><p><br></p><div class="_38NXIU"><div class="_3LyGPp _2briKY"><div><div><div><div class="_2THx53"><b>Other features</b></div><div class="_1aK10F"><p>A
   total sound output of 10 watts, Dolby Digital Plus technology, two HDMI
   ports, one USB port, a contrast ratio of 1000000:1 and a refresh rate 
  of 100 Hz.</p>
  </div></div></div></div></div></div><p><br></p></div>           
                          <div class="tab-pane" id="tab-review">
                <form class="form-horizontal" id="form-review">
                  <div id="review"></div>
                  <h2 class="heading co-heading">Write a review</h2>
                                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label" for="input-name">Your Name</label>
                      <input type="text" name="name" value="" id="input-name" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label" for="input-review">Your Review</label>
                      <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                      <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label rat">Rating</label>
                      &nbsp;&nbsp;&nbsp; Bad&nbsp;
                      <input type="radio" name="rating" value="1" />
                      &nbsp;
                      <input type="radio" name="rating" value="2" />
                      &nbsp;
                      <input type="radio" name="rating" value="3" />
                      &nbsp;
                      <input type="radio" name="rating" value="4" />
                      &nbsp;
                      <input type="radio" name="rating" value="5" />
                      &nbsp;Good</div>
                  </div>
                  <fieldset>
    <legend>Captcha</legend>
    <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-captcha">Enter the code in the box below</label>
      <div class="col-sm-10">
        <input type="text" name="captcha" id="input-captcha" class="form-control" />
        <img src="index2d42.jpg?route=extension/captcha/basic/captcha" alt="" />
            </div>
        </div>
  </fieldset>
  
                  <div class="buttons clearfix">
                    <div class="pull-right">
                      <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                    </div>
                  </div>
                                </form>
              </div>
              </div>
              </div>
  <!-- relatedproduct -->
  <div class="pro-bg">
              <h2 class="home-heading"><span>Related Products</span></h2>
        <div class="allrow pro-nepr">
          <div id="related" class="owl-carousel owl-theme">
                     
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index6a4d.html?route=product/product&amp;product_id=33"><img src="image/cache/catalog/product/inspire-08-205x205.jpg" alt="Samsung SyncMaster 941BW" title="Samsung SyncMaster 941BW" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index6a4d.html?route=product/product&amp;product_id=33">Samsung SyncMaster 941BW</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $242.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('33');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('33');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('33');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="indexd21c.html?route=product/product&amp;product_id=47"><img src="image/cache/catalog/product/inspire-03-205x205.jpg" alt="counseling  insight" title="counseling  insight" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="indexd21c.html?route=product/product&amp;product_id=47">counseling  insight</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              <span class="price-new">$242.00</span> <span class="price-old">$122.00</span>
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('47');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('47');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('47');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index00bd.html?route=product/product&amp;product_id=54"><img src="image/cache/catalog/product/inspire-01-205x205.jpg" alt="Jawahar Navodaya Vidyalaya Class 9 2020" title="Jawahar Navodaya Vidyalaya Class 9 2020" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index00bd.html?route=product/product&amp;product_id=54">Jawahar Navodaya Vidyalaya Class 9 2020</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $1,000.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('54');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('54');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('54');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index6918.html?route=product/product&amp;product_id=56"><img src="image/cache/catalog/product/inspire-17-205x205.jpg" alt="Objective General English" title="Objective General English" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index6918.html?route=product/product&amp;product_id=56">Objective General English</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              <span class="price-new">$50.00</span> <span class="price-old">$5,000.00</span>
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('56');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('56');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('56');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="indexfb01.html?route=product/product&amp;product_id=57"><img src="image/cache/catalog/product/inspire-13-205x205.jpg" alt="All In One ENGLISH CORE CBSE Class 12th" title="All In One ENGLISH CORE CBSE Class 12th" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="indexfb01.html?route=product/product&amp;product_id=57">All In One ENGLISH CORE CBSE Class 12th</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              <span class="price-new">$20.00</span> <span class="price-old">$900.00</span>
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('57');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('57');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('57');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="indexe90e.html?route=product/product&amp;product_id=59"><img src="image/cache/catalog/product/inspire-09-205x205.jpg" alt="iBall Brisk 4G2 16 GB 7 inch with Wi-Fi+4G Tablet" title="iBall Brisk 4G2 16 GB 7 inch with Wi-Fi+4G Tablet" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="indexe90e.html?route=product/product&amp;product_id=59">iBall Brisk 4G2 16 GB 7 inch with Wi-Fi+4G Tablet</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $0.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('59');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('59');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('59');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index086b.html?route=product/product&amp;product_id=61"><img src="image/cache/catalog/product/inspire-04-205x205.jpg" alt="iBall Slide D7061 8 GB 7 inch with Wi-Fi+3G Tablet" title="iBall Slide D7061 8 GB 7 inch with Wi-Fi+3G Tablet" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index086b.html?route=product/product&amp;product_id=61">iBall Slide D7061 8 GB 7 inch with Wi-Fi+3G Tablet</a></h4>
                        <div class="rating">          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
            </div>
                                  <p class="price">
                              $999.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('61');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('61');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('61');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="indexfcfd.html?route=product/product&amp;product_id=64"><img src="image/cache/catalog/product/inspire-14-205x205.jpg" alt="Micromax 81cm (32 inch) HD Ready LED TV" title="Micromax 81cm (32 inch) HD Ready LED TV" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="indexfcfd.html?route=product/product&amp;product_id=64">Micromax 81cm (32 inch) HD Ready LED TV</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $0.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('64');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('64');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('64');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index4624.html?route=product/product&amp;product_id=69"><img src="image/cache/catalog/product/inspire-14-205x205.jpg" alt="Philips MMS2580B/94 30 W Portable Bluetooth Home Audio Speaker" title="Philips MMS2580B/94 30 W Portable Bluetooth Home Audio Speaker" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index4624.html?route=product/product&amp;product_id=69">Philips MMS2580B/94 30 W Portable Bluetooth Home Audio Speaker</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $555.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('69');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('69');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('69');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="indexc629.html?route=product/product&amp;product_id=74"><img src="image/cache/catalog/product/inspire-17-205x205.jpg" alt="Contagious novels" title="Contagious novels" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="indexc629.html?route=product/product&amp;product_id=74">Contagious novels</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              <span class="price-new">$100.00</span> <span class="price-old">$600.00</span>
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('74');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('74');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('74');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index4e80.html?route=product/product&amp;product_id=75"><img src="image/cache/catalog/product/inspire-03-205x205.jpg" alt="The Rudest Book Ever" title="The Rudest Book Ever" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index4e80.html?route=product/product&amp;product_id=75">The Rudest Book Ever</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $888.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('75');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('75');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('75');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index762e.html?route=product/product&amp;product_id=85"><img src="image/cache/catalog/product/inspire-13-205x205.jpg" alt="The Secret Garden" title="The Secret Garden" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index762e.html?route=product/product&amp;product_id=85">The Secret Garden</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              <span class="price-new">$200.00</span> <span class="price-old">$1,000.00</span>
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('85');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('85');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('85');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
            
        <div class="product-layout col-xs-12 propadding text-center">
          <div class="product-thumb transition">
            <div class="image"><a href="index7763.html?route=product/product&amp;product_id=92"><img src="image/cache/catalog/product/inspire-02-205x205.jpg" alt="Maxima 38743LMGI Watch - For Men" title="Maxima 38743LMGI Watch - For Men" class="img-responsive" /></a></div>
            <div class="caption">
              <div class="hoverdes">
              <h4><a href="index7763.html?route=product/product&amp;product_id=92">Maxima 38743LMGI Watch - For Men</a></h4>
                          <div class="rating">
                                      <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                                                <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-2x"></i>
              </span>
                        </div>                        <p class="price">
                              $803.00
                                         </p>
                        </div>
            
            <div class="button-group">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('92');"><svg width="16px" height="18px"> <use xlink:href="#addwish"></use></svg><span class="hidden-xs"></span></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('92');" class="wishcom"><svg width="18px" height="14px"> <use xlink:href="#addcompare"></use></svg><span class="hidden-xs"></span></button>
                <div class="bquickv" title="" data-toggle="tooltip"></div>
              <button type="button" onclick="cart.add('92');" class="acart">
                <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
              </button>
            </div>
          </div>
          </div>
        </div>
      
                </div>
          
          </div>
                </div>
  
                </div>
      </div>
  </div>
  @endsection
  @push('scripts')
  <script type="text/javascript"><!--
  $('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
    $.ajax({
      url: 'index.php?route=product/product/getRecurringDescription',
      type: 'post',
      data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
      dataType: 'json',
      beforeSend: function() {
        $('#recurring-description').html('');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();
  
        if (json['success']) {
          $('#recurring-description').html(json['success']);
        }
      }
    });
  });
  //--></script>
  <script type="text/javascript"><!--
  $('#button-cart').on('click', function() {
    $.ajax({
      url: 'index.php?route=checkout/cart/add',
      type: 'post',
      data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
      dataType: 'json',
      beforeSend: function() {
        $('#button-cart').button('loading');
      },
      complete: function() {
        $('#button-cart').button('reset');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();
        $('.form-group').removeClass('has-error');
  
        if (json['error']) {
          if (json['error']['option']) {
            for (i in json['error']['option']) {
              var element = $('#input-option' + i.replace('_', '-'));
  
              if (element.parent().hasClass('input-group')) {
                element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
              } else {
                element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
              }
            }
          }
  
          if (json['error']['recurring']) {
            $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
          }
  
          // Highlight any found errors
          $('.text-danger').parent().addClass('has-error');
        }
  
        if (json['success']) {
          $('.breadcrumb').after('<div class="alert alert-success alert-dismissible">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
  
          $('#cart > button').html('<svg height="16px" width="16px"><use xlink:href="#basket"></use></svg> ' + json['total'] + '</span>');
  
          $('html, body').animate({ scrollTop: 0 }, 'slow');
  
          $('#cart > ul').load('indexd807.html?route=common/cart/info ul li');
        }
      },
          error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
    });
  });
  //--></script> 
  <script type="text/javascript"><!--
  $('.date').datetimepicker({
    language: 'en-gb',
    pickTime: false
  });
  
  $('.datetime').datetimepicker({
    language: 'en-gb',
    pickDate: true,
    pickTime: true
  });
  
  $('.time').datetimepicker({
    language: 'en-gb',
    pickDate: false
  });
  
  $('button[id^=\'button-upload\']').on('click', function() {
    var node = this;
  
    $('#form-upload').remove();
  
    $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');
  
    $('#form-upload input[name=\'file\']').trigger('click');
  
    if (typeof timer != 'undefined') {
        clearInterval(timer);
    }
  
    timer = setInterval(function() {
      if ($('#form-upload input[name=\'file\']').val() != '') {
        clearInterval(timer);
  
        $.ajax({
          url: 'index.php?route=tool/upload',
          type: 'post',
          dataType: 'json',
          data: new FormData($('#form-upload')[0]),
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $(node).button('loading');
          },
          complete: function() {
            $(node).button('reset');
          },
          success: function(json) {
            $('.text-danger').remove();
  
            if (json['error']) {
              $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
            }
  
            if (json['success']) {
              alert(json['success']);
  
              $(node).parent().find('input').val(json['code']);
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      }
    }, 500);
  });
  //--></script>
  <!--for product quantity plus minus-->
  <script type="text/javascript">
      //plugin bootstrap minus and plus
      $(document).ready(function() {
      $('.btn-number').click(function(e){
      e.preventDefault();
      var fieldName = $(this).attr('data-field');
      var type = $(this).attr('data-type');
      var input = $("input[name='" + fieldName + "']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
      if (type == 'minus') {
      var minValue = parseInt(input.attr('min'));
      if (!minValue) minValue = 1;
      if (currentVal > minValue) {
      input.val(currentVal - 1).change();
      }
      if (parseInt(input.val()) == minValue) {
      $(this).attr('disabled', true);
      }
  
      } else if (type == 'plus') {
      var maxValue = parseInt(input.attr('max'));
      if (!maxValue) maxValue = 999;
      if (currentVal < maxValue) {
      input.val(currentVal + 1).change();
      }
      if (parseInt(input.val()) == maxValue) {
      $(this).attr('disabled', true);
      }
  
      }
      } else {
      input.val(0);
      }
      });
      $('.input-number').focusin(function(){
      $(this).data('oldValue', $(this).val());
      });
      $('.input-number').change(function() {
  
      var minValue = parseInt($(this).attr('min'));
      var maxValue = parseInt($(this).attr('max'));
      if (!minValue) minValue = 1;
      if (!maxValue) maxValue = 999;
      var valueCurrent = parseInt($(this).val());
      var name = $(this).attr('name');
      if (valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
      } else {
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
      }
      if (valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
      } else {
      alert('Sorry, the maximum value was reached');
      $(this).val($(this).data('oldValue'));
      }
      });
      $(".input-number").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== - 1 ||
              // Allow: Ctrl+A
                      (e.keyCode == 65 && e.ctrlKey === true) ||
                      // Allow: home, end, left, right
                              (e.keyCode >= 35 && e.keyCode <= 39)) {
              // let it happen, don't do anything
              return;
              }
              // Ensure that it is a number and stop the keypress
              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
              }
              });
      });
  </script>
  
  <script type="text/javascript"><!--
  $('#review').delegate('.pagination a', 'click', function(e) {
      e.preventDefault();
  
      $('#review').fadeOut('slow');
  
      $('#review').load(this.href);
  
      $('#review').fadeIn('slow');
  });
  
  $('#review').load('indexe842.html?route=product/product/review&amp;product_id=66');
  
  $('#button-review').on('click', function() {
    $.ajax({
      url: 'index.php?route=product/product/write&product_id=66',
      type: 'post',
      dataType: 'json',
      data: $("#form-review").serialize(),
      beforeSend: function() {
        $('#button-review').button('loading');
      },
      complete: function() {
        $('#button-review').button('reset');
      },
      success: function(json) {
        $('.alert-dismissible').remove();
  
        if (json['error']) {
          $('#review').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
        }
  
        if (json['success']) {
          $('#review').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
  
          $('input[name=\'name\']').val('');
          $('textarea[name=\'text\']').val('');
          $('input[name=\'rating\']:checked').prop('checked', false);
        }
      }
    });
  });
  
  $(document).ready(function() {
    $('.thumbnails').magnificPopup({
      type:'image',
      delegate: 'a',
      gallery: {
        enabled: true
      }
    });
  });
  //--></script>
  <!-- related -->
  <script type="text/javascript">
      $(document).ready(function() {
      $("#related").owlCarousel({
      itemsCustom : [
      [0, 2],
      [375, 2],
      [600, 3],
      [768, 4],
      [992, 5],
      [1200, 6],
      [1410, 6]
      ],
        // autoPlay: 1000,
        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        navigation : true,
        pagination:false
      });
      });
  </script>
  <!-- related over -->
  <!-- zoom product start -->
  <!-- zoom product start -->
  <script>
       if (jQuery(window).width() > 991){
          //initiate the plugin and pass the id of the div containing gallery images
              $("#inspzoom").elevateZoom({gallery:'additional', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: ''});
          //pass the images to Fancybox
              $("#inspzoom").bind("click", function (e) {
              var ez = $('#inspzoom').data('elevateZoom');
              $.fancybox(ez.getGalleryList());
              return false;
              });
      }
  </script>
  <!--ZOOM END-->
  
  <!--slider for product-->
  <script type="text/javascript"><!--
  $('#additional').owlCarousel({
    itemsCustom : [
          [0, 3],
          [412, 4],
          [600, 6],
          [768, 3],
          [992, 4],
          [1200, 4]
          ],
     autoPlay: 1000,
    autoPlay: true,
    navigation: false,
    navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    pagination: false
  });
  --></script>
  <!--over slider for product-->
  @endpush