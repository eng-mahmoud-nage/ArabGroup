<div class="allmenu bg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 pull-right text-right" style="direction: rtl">
                <div class="hidden-xs">
                    <div id="wr-menu">
                        <button class="btn-block text-right" type="button" data-target="#all-menu" data-toggle="collapse">
    <i class="fa fa-bars"></i>
    <span class="cate">{{__('التصنيفات')}}</span>
  </button>
                    </div>
                    <div class="hidden-sm hidden-md hidden-lg">
                        <nav id="menu" class="navbar">

                            <div class="navbar-header">
                                <!-- <span id="category" class="visible-xs">All Categories</span> -->
                                <button type="button" class="btn btn-navbar" onclick="openNav()" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                            </div>

                            <div id="mySidenav" class="sidenav">
                                <div class="close-nav">
                                    <span class="categories">Category</span>
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse">
                                    <ul class="nav navbar-nav">
                                        
                                        <li><a href="indexc957.html?route=product/category&amp;path=24">Management book</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                    </div>
                    <div id="all-menu" class="collapse">
                        <nav id="menu" class="navbar">
                        <div class="navbar-header"><span id="category" class="visible-xs">{{__('التصنيفات')}}</span>
                                <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                            </div>


                            
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav">
                                    @foreach ($cats->where('parent_id', 0)->get() as $cat)
                                        <li class="dropdown moremenu">
                                            <a href="index98dc.html?route=product/category&amp;path=20" class="dropdown-toggle header-menu" data-toggle="dropdown">
                                                <div class="menu-img pull-right" style="margin-left: 5px;">
                                                    <img src="{{url('/front')}}/book.png" alt="Comics">
                                                </div>{{$cat->name}}<i class="fa fa-angle-down pull-right enangle"></i></a>
                                                    
                                                <div class="dropdown-menu" style="right: 235px; top:20px;">
                                                    <div class="dropdown-inner">
                                                        @foreach ($cats->where('parent_id', $cat->id)->get() as $subcat)
                                                        <ul class="list-unstyled  text-right">
                                                            <li class="dropdown-submenu"> <a href="indexd9fe.html?route=product/category&amp;path=20_26" class="submenu-title"> {{$subcat->name}} </a>
                                                                @foreach ($cats->where('parent_id', $subcat->id)->get() as $subsub)
                                                                    <ul class="list-unstyled grand-child text-right">
                                                                        <li ><a href="index1e65.html?route=product/category&amp;path=26_62" style="font-size: 14px"> {{$subsub->name}} </a> </li>
                                                                    </ul>
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                        @endforeach
                                                </div>
                                                </div>
                                        </li>  
                                        @endforeach
                                        
                                    </ul>
                                </div>
                        </nav>
                        </div>

                        </div>

                        

@push('scripts')
                        <script type="text/javascript">
         function headermenu() {
     if (jQuery(window).width() < 768)
     {
         jQuery('ul.nav li.dropdown a.header-menu').attr("data-toggle","dropdown");        
     }
     else
     {
         jQuery('ul.nav li.dropdown a.header-menu').attr("data-toggle",""); 
     }
}
$(document).ready(function(){headermenu();});
jQuery(window).resize(function() {headermenu();});
jQuery(window).scroll(function() {headermenu();});
                        </script>
@endpush
                        </div>
                        <div class="col-md-9 col-sm-8 text-right" style="direction: rtl">
                            <ul class="list-inline static-menu hidden-xs">
                            <li><a href="{{url('fronts/books?flag=views')}}">{{__('اكثر مشاهده')}}</a></li>
                                <li><a href="{{url('fronts/books?flag=features')}}">{{__('الكتب المختاره')}}</a></li>
                                <li><a href="{{url('fronts/books?flag=latest')}}">{{__('صدر حديثا')}}</a></li>
                                <li><a href="{{url('fronts/news')}}">{{__('الاخبار')}}</a></li>
                                <li><a href="{{url('fronts/agents')}}">{{__('التوزيعات')}}</a></li>
                                <li><a href="{{url('fronts/dists')}}">{{__('منافذ توزيع')}}</a></li>
                                <li><a href="{{url('fronts/new-book')}}">{{__('انشر كتابك')}}</a></li>
                                <li><a href="{{url('fronts/book-list')}}">{{__('قائمه الكتب')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>