@inject('cats', 'App\Category')
@extends('admin.dashboard')

@section('css')

@endsection

@section('content')
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body pad">
                   {{-- @dd('update') --}}
                   @section('title')
                      {{__('تعديل الاعدادات')}}
                   @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('setting.update', $record->id)}}" enctype="multipart/form-data">
            @csrf 
              <div class="row">

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('التليفون')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->phone}}" id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" @if(!$record->phone) required @endif autocomplete="off">
                      @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>


                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('الموبايل')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->mobile}}" type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" @if(!$record->mobile) required @endif autocomplete="off">
                      @error('mobile')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('العنوان')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->address}}" type="text" name="address" class="form-control @error('address') is-invalid @enderror" @if(!$record->address) required @endif autocomplete="off">
                      @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('البريد الالكترونى')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->email}}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" @if(!$record->email) required @endif autocomplete="off">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Facebook')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->facebook}}" type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" @if(!$record->facebook) required @endif autocomplete="off">
                      @error('facebook')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Instagram')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->instagram}}" type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" @if(!$record->instagram) required @endif autocomplete="off">
                      @error('instagram')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Twitter')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->twitter}}" type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" @if(!$record->twitter) required @endif autocomplete="off">
                      @error('twitter')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Youtube')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->youtube}}" type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" @if(!$record->youtube) required @endif autocomplete="off">
                      @error('youtube')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('WhatsApp')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->whatsapp}}" type="text" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" @if(!$record->whatsapp) required @endif autocomplete="off">
                      @error('whatsapp')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('LinkedIn')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->linkedin}}" type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" @if(!$record->linkedin) required @endif autocomplete="off">
                      @error('linkedin')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <h5>{{__('Welcome Message')}}</h5>
                    <div class="controls mb-1">
                      <textarea id="welcome_msg" name="welcome_msg" class="textarea @error('welcome_msg') is-invalid @enderror" @if(!$record->welcome_msg) required @endif placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{$record->welcome_msg}}
                    </textarea>
                      @error('welcome_msg')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <h5>{{__('Contact Message')}}</h5>
                    <div class="controls mb-1">
                      <textarea id="contact_msg" name="contact_msg" class="textarea @error('contact_msg') is-invalid @enderror" @if(!$record->contact_msg) required @endif placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{$record->contact_msg}}
                    </textarea>
                      @error('contact_msg')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <h5>{{__('About')}}</h5>
                    <div class="controls mb-1">
                      <textarea id="about" name="about" class="textarea @error('about') is-invalid @enderror" @if(!$record->about) required @endif placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{$record->about}}
                    </textarea>
                      @error('about')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>     
              </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                  @method("PUT")
                  <button type="submit" class="btn btn-success">{{__('تعديل')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                      <button type="reset" class="btn btn-danger">{{__('Reset')}} <i class="fa fa-refresh position-right"></i></button>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script type="text/javascript">
  $(document).ready(function () {
console.log($('#cover_img').val(),$('input[type=file]').val());

    $('#quickForm').validate({
      rules: {
        text: {
          required: true,
        },
        text: {
          required: true,
        },
        date: {
          required: true,
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

  });
  </script>
@endpush
<!-- Input Validation end -->

@endsection