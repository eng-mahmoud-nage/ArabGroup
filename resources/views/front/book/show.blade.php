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
        <div class=""   style="width: 75%">
          <div class="col-md-12 col-sm-12 inspire-form-bg">
                                  <div class="col-md-5 col-sm-6 proimg pull-right"> 
                                  <ul class="thumbnails">
                                  <li><a class="thumbnail" href="{{asset('/uploads').'/'.$record->cover_img}}" title="{{$record->name}}">
                                       <img data-zoom-image="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" src="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" id="inspzoom" class="img-responsive center-block" alt="image">
                                  </a>
                              </li>
                                                                                      <div class="row">
                              <li id="additional" class="owl-carousel">
                                      <a data-zoom-image="{{asset('/uploads').'/'.$record->cover_img}}" data-image="{{asset('/uploads').'/'.$record->cover_img}}"  href="{{asset('/uploads').'/'.$record->cover_img}}">
                                      <img src="{{asset('/uploads/thumbs').'/'.$record->cover_img}}" class="img-responsive center-block col-xs-12" alt="additional image">
                                  </a>
                                
                                      <a data-zoom-image="{{asset('/uploads/thumbs').'/'.$record->back_img}}" data-image="{{asset('/uploads/thumbs').'/'.$record->back_img}}"  href="{{asset('/uploads').'/'.$record->back_img}}">
                                      <img src="{{asset('/uploads/thumbs').'/'.$record->back_img}}" class="img-responsive center-block col-xs-12" alt="additional image">
                                  </a>
                                                              </li>
                              </div>
                                                      </ul>
                    </div>
                                  <div class="col-md-7 col-sm-6 product-right">
            <!--product Details Start -->
            <div class="col-md-12 xspro pull-left text-right">
            <h1>{{$record->name}}</h1>
              <hr class="prosp">
              <ul class="list-unstyled">
              <li>{{$record->isbn}}<span class="text-prodecor">رقم الكتاب</span></li>
              <li>{{$record->author}}<span class="text-prodecor">المؤلف</span></li><br>
              <li>$ {{$record->price}}<span class="text-prodecor">السعر</span></li>
                          </ul>
              <div id="product">   <!-- Quantity option -->
                <form action="{{route('items.store')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 col-md-2 col-xs-2 op-box qtlabel">
                        <label class="control-label text-prodecorop" for="input-quantity">الكميه</label>
                      </div>
                <div class="col-md-10 col-sm-10 col-xs-10 op-box qty-plus-minus">
                  <a class="form-control pull-left btn-number btnminus" disabled="disabled" data-type="minus" data-field="quantity">
                    <span class="glyphicon glyphicon-minus"></span>
                  </a>
                  <input id="input-quantity" type="text" name="quantity" value="1" size="2"  class="form-control pull-left" />
                <input type="hidden" name="book_id" value="{{$record->id}}" />
                <a class="form-control pull-left btn-number btnplus" data-type="plus" data-field="quantity">
                  <span class="glyphicon glyphicon-plus"></span>
                 </a>
                </div>
              </div><hr class="prosp">
              <button class="btn btn-primary">اضف للعربه</button>
              <hr class="prosp">
            </div>
          </form>                      
              <!-- Quantity option end -->
              </div>
            </div>

             
            </div>                             
            
           
          </div>
        </div>
  <div class="propage-tab"  style="width: 75%">
        <ul class="nav nav-tabs">
              <li class="pull-right"><a href="#tab-description" data-toggle="tab">التفاصيل</a></li>            
                        </ul>
            <div class="tab-content">
                           <div class="tab-pane" id="tab-description"><!--Collapse Start-->
  <div class="text-right">
    <h2>تفاصيل المنتج</h2>  
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">حول الكتاب</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body row text-right">
            <div class="col-lg-2 pull-right">
              <label for="name" class="title">رقم الكتاب</label>

            </div>
            <div class="col-lg-10">
            <p class="content">{{$record->isbn}}</p>
            </div>   <div class="col-lg-2 pull-right">
              <label for="name" class="title"> العنوان</label>

            </div>
            <div class="col-lg-10">
            <p class="content">{{$record->name}}</p>
            </div>   <div class="col-lg-2 pull-right">
              <label for="name" class="title"> المؤلف</label>

            </div>
            <div class="col-lg-10">
            <p class="content">{{$record->author}}</p>
            </div>   <div class="col-lg-2 pull-right">
              <label for="name" class="title"> تاريخ الاصدار</label>

            </div>
            <div class="col-lg-10">
            <p class="content">{{$record->publish_date}}</p>
            </div>   <div class="col-lg-2 pull-right">
              <label for="name" class="title"> الوزن</label>

            </div>
            <div class="col-lg-10">
            <p class="content">{{$record->weight}}</p>
            </div>


</div>

        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">تفاصيل الكتاب</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse in">
          <div class="panel-body">
            <div class="col-lg-2 pull-right">
              <label for="name" class="title"> التفاصيل</label>
            </div>
            <div class="col-lg-10">
              <br>
            <p class="content">{!!$record->details!!}</p>
            </div>
          </div>

        </div>
      </div>

    </div> 
  </div>
  <!--Collapse End-->
  
  <!-- cpt_container_end --></div>    

              </div>
              </div>
  <!-- relatedproduct -->


@include('front.book.bookslider')
 
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
  {{-- <script type="text/javascript"><!--
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
  //--></script>  --}}
  {{-- <script type="text/javascript"><!--
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
  //--></script> --}}
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
  
  $('#review').load('indexa4c1.html?route=product/product/review&amp;product_id=49');
  
  $('#button-review').on('click', function() {
    $.ajax({
      url: 'index.php?route=product/product/write&product_id=49',
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