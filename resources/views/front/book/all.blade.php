@extends('front.index')
             @section('content')
             <body>
                 <div id="product-category" class="container common-shed">
                 
                   <div class="row">
                                 <div id="content" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                       
                                   <h3>Refine Search</h3>
                             <div class="row">
                         <div class="col-sm-12 sb-theme-cat-list ">
                           <ul>
                                         <li><a href="index1d3f.php?route=product/category&amp;path=27_64&amp;sort=pd.name&amp;order=ASC&amp;limit=16">General Non-Ficton Books (21)</a></li>
                                         <li><a href="indexbcb3.html?route=product/category&amp;path=27_66&amp;sort=pd.name&amp;order=ASC&amp;limit=16">Healthy Living  Books (3)</a></li>
                                         <li><a href="index2f8b.html?route=product/category&amp;path=27_67&amp;sort=pd.name&amp;order=ASC&amp;limit=16">Memoirs Books (1)</a></li>
                                         <li><a href="index1efd-2.html?route=product/category&amp;path=27_65&amp;sort=pd.name&amp;order=ASC&amp;limit=16">Wellness Books (2)</a></li>
                                       </ul>
                         </div>
                       </div>
                                         <div class="row cate-border">
                             <div class="col-md-2 col-sm-3 col-xs-3 catebt">
                                 <div class="btn-group-sm">
                                     <button type="button" id="list-view" class="btn inslistgrid" data-toggle="tooltip" title="List">
                                         <img src="{{url('/front')}}/image/catalog/category/list.png">
                                     </button>
                                     <button type="button" id="grid-view" class="btn inslistgrid" data-toggle="tooltip" title="Grid">
                                          <img src="{{url('/front')}}/image/catalog/category/grid.png">
                                     </button>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-5 col-sm-6 col-xs-7 hidden-md hidden-sm hidden-xs ct">
                                 <a href="index6431.html?route=product/compare" id="compare-total" class="btn btn-link">Product Compare (0)</a>
                             </div>
                             <div class="col-lg-4 col-md-5 col-xs-5 col-sm-5 sorting">
                                 <div class="input-group input-group-sm">
                                     <label class="input-group-addon" for="input-sort">Sort By:</label>
                                     <select id="input-sort" class="form-control" onchange="location = this.value;">
                                                                                                     <option value="index9dd0.php?route=product/category&amp;path=27&amp;sort=p.sort_order&amp;order=ASC&amp;limit=16">Default</option>
                                                                                                                                 <option value="http://templatetasarim.com/opencart/Books/index.php?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=ASC&amp;limit=16" selected="selected">Name (A - Z)</option>
                                                                                                                                 <option value="indexc3f3.html?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=DESC&amp;limit=16">Name (Z - A)</option>
                                                                                                                                 <option value="indexbeaa.html?route=product/category&amp;path=27&amp;sort=p.price&amp;order=ASC&amp;limit=16">Price (Low &gt; High)</option>
                                                                                                                                 <option value="index0186.html?route=product/category&amp;path=27&amp;sort=p.price&amp;order=DESC&amp;limit=16">Price (High &gt; Low)</option>
                                                                                                                                 <option value="index8c63.php?route=product/category&amp;path=27&amp;sort=rating&amp;order=DESC&amp;limit=16">Rating (Highest)</option>
                                                                                                                                 <option value="index98a4-2.php?route=product/category&amp;path=27&amp;sort=rating&amp;order=ASC&amp;limit=16">Rating (Lowest)</option>
                                                                                                                                 <option value="indexe85b.html?route=product/category&amp;path=27&amp;sort=p.model&amp;order=ASC&amp;limit=16">Model (A - Z)</option>
                                                                                                                                 <option value="indexb972.html?route=product/category&amp;path=27&amp;sort=p.model&amp;order=DESC&amp;limit=16">Model (Z - A)</option>
                                                                                         </select>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-5 col-xs-4 col-sm-4 sorting">
                                 <div class="input-group input-group-sm">
                                     <label class="input-group-addon" for="input-limit">Show:</label>
                                     <select id="input-limit" class="form-control" onchange="location = this.value;">
                                                                                                     <option value="http://templatetasarim.com/opencart/Books/index.php?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=ASC&amp;limit=16" selected="selected">16</option>
                                                                                                                                 <option value="index16e7.php?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=ASC&amp;limit=25">25</option>
                                                                                                                                 <option value="index3222.php?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=ASC&amp;limit=50">50</option>
                                                                                                                                 <option value="index6dea.php?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=ASC&amp;limit=75">75</option>
                                                                                                                                 <option value="index3296.php?route=product/category&amp;path=27&amp;sort=pd.name&amp;order=ASC&amp;limit=100">100</option>
                                                                                         </select>
                                 </div>
                             </div>
                         </div>
                       <div class="row catebg">     
                           @foreach ($records as $record)
                       <div class="product-layout product-list propadding text-center">
                         <div class="product-thumb transition text-center">
                           <div class="image">
                               <a href="{{url('fronts/book'.'/'.$record->id)}}">
                                <img src="{{url('/uploads/thumbs').'/'.$record->cover_img}}" alt="affordable housing" title="affordable housing" class="img-responsive" height="250"/>
                            </a>
                               <!-- insp Images Start -->
                            <a href="{{url('fronts/book'.'/'.$record->id)}}">
                                <img src="{{url('/uploads/thumbs').'/'.$record->cover_img}}" class="img-responsive second-img" alt="hover image" height="250"/>
                            </a>
                                                                                                                                                                                                                                                                                                                                                               <!-- insp Images End -->
                           </div>
                           <div class="caption">
                             <div class="hoverdes">
                             <h4><a href="{{url('fronts/book'.'/'.$record->id)}}">{{$record->name}}</a></h4>
                             <p class="list-des">{!!$record->details!!}</p>
                                <p class="price">
                                             <span class="price-new">{{$record->price}}</span> <span class="price-old">{{$record->price}}</span>
                                </p>
                                       </div>
                           
                           <div class="button-group">
                               <div class="bquickv" title="" data-toggle="tooltip"></div>
                             <button type="button" onclick="cart.add('28');" class="acart">
                               <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
                             </button>
                           </div>
                         </div>
                         </div>
                       </div>
                       @endforeach
                     
                        </div>
                       <div class="row pagi">
                         <div class="col-sm-6 col-xs-6 text-left pagination">
                                    {{$records->links()}}
                        </div>
                         <div class="col-sm-6 col-xs-6 text-right tot"></div>
                       </div>
                                   </div>
                     </div>
                 </div>
                 @endsection
                 @push('scripts')

                 @endpush