@inject('items', 'App\BookOrder')
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 pull-right">
                <div id="logo">
                <a href="{{url('/fronts/welcome')}}">
                        <img src="{{url('/images')}}/logo.png" title="Shoppee Store" alt="Shoppee Store" class="img-responsive pull-right" />
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12 pull-right" style="margin-top: 20px">
                <div id="search-by-category">
                    <div class="search-container">
                        <div class="categories-container text-right">
                            <div class="hover-cate">
                                <p><span class="cate-selected" data-value="0">التصنيفات</span></p>
                                <ul class="cate-items">
                                    @if(isset($cats))
                                        @foreach ($cats->where('parent_id', 0)->get() as $cat)
                                            <li class="item-cate" data-value="{{$cat->id}}">{{$cat->name}}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="search-box input-group">
                            <input type="text" name="search" id="text-search" value="" placeholder="بحث" class="" />
                            <div id="sp-btn-search" class="input-group-btn">
                            <button type="button" id="btn-search-category" class="btn"><span class="hidden-xs hidden-sm">{{__('بحث')}}</span><span class="visible-xs visible-sm"><i class="fa fa-search"></i></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="search-ajax">
                        <div class="ajax-loader-container" style="display: none;">
                            <img src="{{url('/front')}}/image/catalog/loader.gif" class="ajax-load-img" alt="loader" />
                        </div>
                        <div class="ajax-result-container">
                            <!-- Content of search results -->
                        </div>
                    </div>
                    <input type="hidden" id="ajax-search-enable" value="1" />
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        var flag = false;
                        var ajax_search_enable = $('#ajax-search-enable').val();

                        var current_cate_value = $('ul.cate-items li.selected').data('value');
                        var current_cate_text = $('ul.cate-items li.selected').html();

                        $('.cate-selected').attr('data-value', current_cate_value);
                        $('.cate-selected').html(current_cate_text);

                        $('.hover-cate p').click(function() {
                            $(".cate-items").slideToggle("slow");
                            $(".cate-items").addClass("sblock");
                        });

                        $('.ajax-result-container').hover(
                            function() {
                                flag = true;
                            },
                            function() {
                                flag = false;
                            }
                        );

                        $('.hover-cate').hover(
                            function() {
                                flag = true;
                            },
                            function() {
                                flag = false;
                            }
                        );

                        $('#search-by-category').focusout(function() {
                            if (flag == true) {
                                $('.ajax-result-container').show();
                            } else {
                                $('.ajax-result-container').hide();
                            }
                        });

                        $('#search-by-category').focusin(function() {
                            $('.ajax-result-container').show();
                        });

                        $('#text-search').keypress(function(e) {
                            if (e.which == 13) { //Enter key pressed
                                $('#btn-search-category').click(); //Trigger search button click event
                            }
                        });

                        $('#btn-search-category').click(function() {
                            var url = 'index64b3.html?route=product/search';
                            var text_search = $('#text-search').val();
                            if (text_search) {
                                url += '&search=' + encodeURIComponent(text_search);
                            }

                            var category_search = $('.cate-selected').attr("data-value");
                            if (category_search) {
                                url += '&category_id=' + encodeURIComponent(category_search);
                            }

                            location = url;
                        });

                        if (ajax_search_enable == '1') {
                            $('#text-search').keyup(function(e) {
                                var text_search = $(this).val();
                                var cate_search = $('.cate-selected').attr("data-value");
                                if (text_search != null && text_search != '') {
                                    ajaxSearch(text_search, cate_search);
                                } else {
                                    $('.ajax-result-container').html('');
                                    $('.ajax-loader-container').hide();
                                }
                            });

                            $('ul.cate-items li.item-cate').click(function() {
                                var cate_search = $(this).data('value');
                                var text_search = $('#text-search').val();
                                $('.cate-selected').attr('data-value', cate_search);
                                $('.cate-selected').html($(this).html());
                                if (text_search != null && text_search != '') {
                                    ajaxSearch(text_search, cate_search);
                                } else {
                                    $('.ajax-result-container').html('');
                                    $('.ajax-loader-container').hide();
                                }
                                $(".cate-items").hide();
                                $('#text-search').focus();
                            });

                        }

                        function ajaxSearch(text_search, cate_search) {
                            $.ajax({
                                url: 'http://templatetasarim.com/opencart/Books/index.php?route=extension/module/ocsearchcategory/ajaxSearch',
                                type: 'post',
                                data: {
                                    text_search: text_search,
                                    cate_search: cate_search
                                },
                                beforeSend: function() {
                                    $('.ajax-loader-container').show();
                                },
                                success: function(json) {
                                    if (json['success'] == true) {
                                        $('.ajax-result-container').html(json['result_html']);
                                        $('.ajax-loader-container').hide();
                                    }
                                }
                            });
                        }

                    });
                </script>
            </div>
            <div class="col-sm-3 text-left xs-cart" style="margin-top: 20px">
                <div id="cart" class="btn-group">
                <button onclick="GetData()" data-toggle="dropdown" data-loading-text="Loading..." class="dropdown-toggle text-right" style="direction: rtl">
                    <svg height="16px" width="16px"><use xlink:href="#basket"></use></svg>
                     ( <span id="total">@auth {{$items->where('user_id', auth()->user()->id)->where('order_id', 0)->count()}} @endauth</span> )
                     <span id="cart-total"> {{__('عنصر')}}</span></button>
                    @auth
                     <ul class="dropdown-menu text-center" id="my_cart">
                        @forelse ($items->where('user_id', auth()->user()->id)->where('order_id', 0)->get() as $item)




                     <li class="text-center" id="li_item{{$item->id}}">


                                    <div class="row">

                            <table class="table table-striped" style="direction: rtl">
                                      <tbody>
                                          <tr>

                                          <td class="text-center"> <a href="{{url('/uploads')}}/{{App\Book::where('id', $item->book_id)->pluck("cover_img")[0]}}"><img src="{{url('/uploads')}}/thumbs/{{App\Book::where('id', $item->book_id)->pluck("cover_img")[0]}}" width="47" height="47" alt="iPhone" title="iPhone" class="img-thumbnail"></a> </td>
                                <td class="" style="word-wrap: break-word;">
                                {!!App\Book::where('id', $item->book_id)->pluck('name')[0]!!}
                                        </td>
                                <td class="">
                                   X {{$item->quantity}}
                                </td>
                                <td class="text-right">${{$item->quantity*$item->price}}</td>
                                <td class="text-center"><button class="delete del-item" onclick="RemoveItem({{$item->id}})" class="" style="background: none;border: none;color: red">
                                    <i class="fas fa-times" ></i>
                                </button>
                            </td>
                            </tr>
                                            </tbody></table>
                          </li>

                            @empty
                                
                            <li>
                                <p class="text-center">{{__('لا يوجد منتجات')}}</p>
                            </li>
                            @endforelse
                            <div id="summary">
                                <table class="table table-bordered text-right" style="direction: rtl">
                                            <tbody>
                                                <tr>
                                            <td class="text-right">{{__('العدد الكلي')}}</td></td>
                                    <td class="text-right" id="num"></td>
                                  </tr>
                                  <tr>
                                            <td class="text-right">{{__('تكلفه المنتجات')}}</td></td>
                                    <td class="text-right" id="total_prod"></td>
                                  </tr>
                                            <tr>
                                    <td class="text-right">{{__('مصاريف الشحن')}}</td>
                                    <td class="text-right" id="charge">$100</td>
                                  </tr>
                                            {{-- <tr>
                                    <td class="text-right">{{__('')}}</td>
                                    <td class="text-right" id="charge">$100.00</td>
                                  </tr> --}}
                                            <tr>
                                    <td class="text-right">{{__('التكلفه الكليه')}}</td>
                                            <td class="text-right" id="total_cost"></td>
                                  </tr>
                                          </tbody></table>
                                        <p class="text-right"><a href="{{route('items.index')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="http://templatetasarim.com/opencart/Books/index.php?route=checkout/checkout" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                              </div>
                            @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<script>


 function GetData(){
    console.log('ok');
    var total=0;
    var prod=0;
$.ajax({
                  url: "{{route('items.index')}}",
                  type: "GET",

                  success: function(data) {
                        console.log(data.status);
                      if (data.status === 1) {

                              if(data.data.length > 0){
                                for(var i=0; i<data.data.length; i++){
                             total += data.data[i].price * data.data[i].quantity;
                                prod += 1;
                            console.log(data.data[i].price);
                              }
                              }
                          $('#num').empty();
                          $('#num').text("$"+prod);
                          $('#total_prod').empty();
                          $('#total_prod').text("$"+total);
                          $('#total_cost').empty();
                          $('#total_cost').text("$"+(total + 100));
                          console.log(data.data.price);
                      }else {
                      }
                  },
                  error: function(xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
       },
              });
};

        function RemoveItem(item_id) {
        var total = parseInt($('#total').text());
        var li_id = '#li_item'+item_id ;
      console.log(item_id, total-1, li_id);

       var status = confirm('Are You Sure?');
          if (item_id && status) {
              $.ajax({
                  url: "{{url('fronts/items')}}/" + item_id,
                  type: "DELETE",
                  data: {
                        "_token": "{{ csrf_token() }}",
                        },
                  success: function(data) {
                        console.log(data.status);
                      if (data.status === 1) {
                        $('#total').empty();
                        $('#total').text(total-1);
                        $(li_id).css('display', 'none');
                        alert("تمت الحذف بنجاح");
                      }else {
                        alert("حاول مره اخرى");
                      }
                  },
                  error: function(xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
       },
              });
          }
        }
</script>
