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
          <div class="card-body">

            @if($record->name == null)
                   {{-- @dd('create') --}}
                   @section('title')
                      {{__('اضافه تصنيف')}}
                    @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('category.store')}}">

                @else
                   {{-- @dd('update') --}}
                   @section('title')
                      {{__('تعديل تصنيف')}}
                   @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('category.update', $record->id)}}">
                @endif
            @csrf 
              <div class="row">

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('الاسم')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->name}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" @if(!$record->name) required @endif autocomplete="off">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                    <h5>{{__('تصنيف اساسى')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select id="parent_id" name="parent_id" @if(!$record->id && $record->parent_id != null) required @endif>
                        @if($record->parent_id) <option value="{{$record->where('id', $record->parent_id)->pluck('id')}}"selected>{{$record->where('id', $record->parent_id)->pluck('name')}}</option> @endif
                        <option value="0">رئيسي</option>
                        @foreach ($cats->all() as $cat)
                            <option value="{{$cat->id}}"> {{$cat->name}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div></div>

              </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      @if($record->name == null)
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