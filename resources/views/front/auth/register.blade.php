@inject('counts', 'App\Country')
@extends('front.index')

@section('style')
    
@endsection

@section('title')
    {{__('انشاء حساب')}}
@endsection

@section('content')
<div id="account-register" class="container">
  <ul class="breadcrumb" style="width:75%">
    <li><a href="{{url('fronts/welcome')}}">الرئيسيه</a></li>
    <li><a href="#" disabled>الحساب</a></li>
    <li><a href="#">@yield('title')</a></li>
    </ul>
  <div class="row text-right">
      <div id="content" class="col-md-9 col-sm-8 col-xs-12">
          <div class="inspire-form-bg">
              <h1 class="heading">{{__('انشاء حساب')}}</h1>
          <p class="already-acc">{{__('يمكنك الدخول مباشرة لو لديك حساب')}} <a href="{{url('/fronts')}}/user-login">{{__('تسجيل الدخول')}}</a>.</p>
          <form action="{{url('/fronts')}}/user-registers" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
                  <fieldset id="account" class="text-right">
                      <legend>{{__('بياناتك الشخصيه')}}</legend>
              
                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-firstname">{{__('الاسم')}}</label>
                          <div class="col-sm-10">
                              <input type="text" name="name" value="" required placeholder="{{__('الاسم')}}" id="input-firstname" class="form-control" />
                          </div>
                      </div>

                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-address">{{__('العنوان')}}</label>
                          <div class="col-sm-10">
                              <input type="text" name="address" value="" required placeholder="{{__('العنوان')}}" id="input-address" class="form-control" />
                          </div>
                      </div>


                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-email">{{__('البريد الالكترونى')}}</label>
                          <div class="col-sm-10">
                              <input type="email" name="email" value="" required placeholder="{{__('البريد الالكترونى')}}" id="input-email" class="form-control" />
                          </div>
                      </div>

                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-telephone">{{__('رقم التليفون')}}</label>
                          <div class="col-sm-10">
                              <input type="tel" name="phone" value="" required placeholder="{{__('رقم التليفون')}}" id="input-telephone" class="form-control" />
                          </div>
                      </div>

                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-telephone">{{__('اختر دوله')}}</label>
                          <div class="col-sm-10">
                            <select name="country_id" id="country">
                                <option value="" disabled selected>{{__('اختؤ دوله')}}</option>
                                @foreach ($counts->all() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group required city" style="display: none">
                          <label class="col-sm-2 control-label" for="input-telephone">{{__('اختر محافظه')}}</label>
                          <div class="col-sm-10">
                              <select name="city_id" id="city" required></select>
                          </div>
                      </div>

                  </fieldset>
                  <fieldset>
                      <legend>{{__('بيانات الحساب')}}</legend>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-username">{{__('اسم المستخدم')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_name" value="" required placeholder="{{__('اسم المستخدم')}}" id="input-username" class="form-control" />
                        </div>
                    </div>

                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-password">{{__('الرقم السرى')}}</label>
                          <div class="col-sm-10">
                              <input type="password" name="password" value="" required placeholder="{{__('الرقم السرى')}}" id="input-password" class="form-control" />
                          </div>
                      </div>
                      <div class="form-group required">
                          <label class="col-sm-2 control-label" for="input-confirm">{{__('تاكيد الرقم السرى')}}</label>
                          <div class="col-sm-10">
                              <input type="password" name="confirm" value="" required placeholder="{{__('تاكيد الرقم السرى')}}" id="input-confirm" class="form-control" />
                          </div>
                      </div>
                  </fieldset>
                    <input type="submit" value="{{__('تسجيل')}}" class="btn btn-primary" />
                  </div>
              </form>
          </div>
      </div>

  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">

  // Sort the custom fields
  $('#account .form-group[data-sort]').detach().each(function() {
      if ($(this).attr('data-sort') >= 0 && $(this).attr('data-sort') <= $('#account .form-group').length) {
          $('#account .form-group').eq($(this).attr('data-sort')).before(this);
      }

      if ($(this).attr('data-sort') > $('#account .form-group').length) {
          $('#account .form-group:last').after(this);
      }

      if ($(this).attr('data-sort') == $('#account .form-group').length) {
          $('#account .form-group:last').after(this);
      }

      if ($(this).attr('data-sort') < -$('#account .form-group').length) {
          $('#account .form-group:first').before(this);
      }
  });

  $('input[name=\'customer_group_id\']').on('change', function() {
      $.ajax({
          url: 'index.php?route=account/register/customfield&customer_group_id=' + this.value,
          dataType: 'json',
          success: function(json) {
              $('.custom-field').hide();
              $('.custom-field').removeClass('required');

              for (i = 0; i < json.length; i++) {
                  custom_field = json[i];

                  $('#custom-field' + custom_field['custom_field_id']).show();

                  if (custom_field['required']) {
                      $('#custom-field' + custom_field['custom_field_id']).addClass('required');
                  }
              }
          },
          error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
      });
  });

  $('input[name=\'customer_group_id\']:checked').trigger('change');

</script>
<script type="text/javascript">

  $('button[id^=\'button-custom-field\']').on('click', function() {
      var element = this;

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
                      $(element).button('loading');
                  },
                  complete: function() {
                      $(element).button('reset');
                  },
                  success: function(json) {
                      $(element).parent().find('.text-danger').remove();

                      if (json['error']) {
                          $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
                      }

                      if (json['success']) {
                          alert(json['success']);

                          $(element).parent().find('input').val(json['code']);
                      }
                  },
                  error: function(xhr, ajaxOptions, thrownError) {
                      alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                  }
              });
          }
      }, 500);
  });

</script>


<script>
 $(document).ready(function(){
        
        $('#country').on('change',function(){
        var country_id = $('#country').val();
        if(country_id){
            $.ajax({
                url : "{{url('fronts/city?country_id=')}}" + country_id,
                type: "GET",
                success:function(data){
                    if(data.status === 1){
                      $(".city").css('display', 'block');
                      $("#city").empty();
                      $("#city").append('<option disabled selected>{{__("اختر محافظه")}}</option>');
                        $.each(data.data, function(index, city){
                            $("#city").append(new Option(city.name, city.id));
                            console.log(city.name, $("#city").val(), $("#country").val());
                        });
                    }else{
                        $("#city").empty();
                        $("#city").append('<option disabled selected>{{__("اختر محافظه")}}</option>');
                    }

                    },
            });
        }else{
                        $("#city").empty();
                        $("#city").append('<option disabled selected>{{__("اختر محافظه")}}</option>');
                    }
    });
  });
</script>
    
@endpush