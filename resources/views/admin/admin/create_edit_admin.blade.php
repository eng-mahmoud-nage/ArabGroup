@extends('admin.dashboard')

@section('css')

@endsection

@section('content')

<div class="row">
  <div class="col-sm-12">
    {{-- <div class="content-header">Add New admins</div> --}}
  </div>
</div>
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body">

            @if($record->user_name == null)
                   {{-- @dd('create') --}}
                   @section('title')
                      {{__('اضافه مشرف')}}
                    @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('admins.store')}}">

                @else
                   {{-- @dd('update') --}}
                   @section('title')
                      {{__('تعديل مشرف')}}
                   @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('admins.update', $record->id)}}">
                @endif
            @csrf 
              <div class="row">

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('اسم المستخدم')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->user_name}}" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" @if(!$record->user_name) required @endif autocomplete="off">
                      @error('user_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @if($record->user_name == null)
                  <div class="form-group">
                    <h5>{{__('الرقم السري')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input  type="password" name="password" class="form-control @error('password') is-invalid @enderror" @if(!$record->user_name) required @endif autocomplete="false">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif
                </div>
              </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                      @if($record->user_name == null)
                      <button type="submit" class="btn btn-success">{{__('اضافه')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                  @else
                  @method("PUT")
                  <button type="submit" class="btn btn-success">{{__('تعديل')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                  @endif
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
    $.validator.setDefaults({
      // submitHandler: function () {
      //   alert( "Form successful submitted!" );
      // }
    });
    $('#quickForm').validate({
      rules: {
        text: {
          required: true,
        },
        password: {
          required: true,
          minlength: 5
        },
      },
      messages: {
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
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