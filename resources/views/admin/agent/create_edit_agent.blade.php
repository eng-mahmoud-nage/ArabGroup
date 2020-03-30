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
          <div class="card-body">

            @if($record->title == null)
                   {{-- @dd('create') --}}
                   @section('title')
                      {{__('اضافه توزيع')}}
                    @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('agent.store')}}">

                @else
                   {{-- @dd('update') --}}
                   @section('title')
                      {{__('تعديل توزيع')}}
                   @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('agent.update', $record->id)}}">
                @endif
            @csrf 
              <div class="row">

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('العنوان')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->title}}" type="text" name="title" class="form-control @error('title') is-invalid @enderror" @if(!$record->title) required @endif autocomplete="off">
                      @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('البلد')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->country}}" type="text" name="country" class="form-control @error('country') is-invalid @enderror" @if(!$record->country) required @endif autocomplete="off">
                      @error('country')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('الموقع الالكترونى')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->website}}" type="site" name="website" class="form-control @error('website') is-invalid @enderror" @if(!$record->website) required @endif autocomplete="off">
                      @error('website')
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
                      @if($record->title == null)
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
    $('#quickForm').validate({
      rules: {
        text: {
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