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

            @if($record->name == null)
                   {{-- @dd('create') --}}
                   @section('title')
                      {{__('اضافه كتاب')}}
                    @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">

                @else
                   {{-- @dd('update') --}}
                   @section('title')
                      {{__('تعديل كتاب')}}
                   @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('books.update', $record->id)}}" enctype="multipart/form-data">
                @endif
            @csrf 
              <div class="row">

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('الاسم')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->name}}" id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" @if(!$record->name) required @endif autocomplete="off">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>


                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('المؤلف')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->author}}" type="text" name="author" class="form-control @error('author') is-invalid @enderror" @if(!$record->author) required @endif autocomplete="off">
                      @error('author')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('ISBN')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->isbn}}" type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" @if(!$record->isbn) required @endif autocomplete="off">
                      @error('isbn')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('تاريخ النشر')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->publish_date}}" type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" @if(!$record->publish_date) required @endif autocomplete="off">
                      @error('publish_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('السعر')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->price}}" type="number" name="price" class="form-control @error('price') is-invalid @enderror" @if(!$record->price) required @endif autocomplete="off">
                      @error('price')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('الوزن')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->weight}}" type="number" name="weight" class="form-control @error('weight') is-invalid @enderror" @if(!$record->weight) required @endif autocomplete="off">
                      @error('weight')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <h5>{{__('التفاصيل')}}</h5>
                    <div class="controls mb-1">
                      <textarea id="details" name="details" class="textarea @error('details') is-invalid @enderror" @if(!$record->details) required @endif placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{$record->details}}
                    </textarea>
                      @error('details')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('صوره الغلاف')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input accept="jpg,png,gif,jpeg" type="file" id="cover_img" name="cover_img" class="form-control @error('cover_img') is-invalid @enderror" @if(!$record->cover_img) required @endif autocomplete="off">
                      @error('cover_img')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('صوره الخلف')}}</h5>
                    <div class="controls mb-1">
                      <input accept="jpg,png,gif,jpeg" type="file" name="back_img" class="form-control @error('back_img') is-invalid @enderror">
                      @error('back_img')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('PDF')}}</h5>
                    <div class="controls mb-1">
                      <input accept="pdf" type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror">
                      @error('pdf')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                    <h5>{{__('التصنيف')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select id="category_id" name="category_id" @if(!$record->category_id) required @endif>
                        @if($record->category_id) <option value="{{$record->category_id}}"selected>{{$record->category->name}}</option> 
                        @else
                        <option disabled selected></option>                        
                        @endif
                        @foreach ($cats->all() as $cat)
                            <option value="{{$cat->id}}"> {{$cat->name}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-12">
                  <hr>

                  <h1>SEO Section</h1>
                </div>

                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Title')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->permalink_title}}" type="text" id="permalink_title" name="permalink_title" class="form-control @error('permalink_title') is-invalid @enderror" required>
                      @error('permalink_title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Keywords')}}</h5>
                    <div class="controls mb-1">
                      <input value="{{$record->permalink_keyword}}" type="text" id="permalink_keyword" name="permalink_keyword" class="form-control @error('permalink_keyword') is-invalid @enderror" required>
                      @error('permalink_keyword')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <h5>{{__('Description')}}</h5>
                    <div class="controls mb-1">
                      <textarea id="permalink_description" name="permalink_description" class="form-control @error('permalink_description') is-invalid @enderror" required>
                        {{$record->permalink_description}}
                      </textarea>
                      @error('permalink_description')
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
console.log($('#cover_img').val(),$('input[type=file]').val());

    $('#quickForm').validate({
      rules: {
        text: {
          required: true,
        },
        number: {
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

    $('#name').on('keyup', function(){
        $('#permalink_title').val($('#name').val().replace(' ', '-'));
        $('#permalink_keyword').val($('#name').val().replace(' ', ','));
    });

    $('#details').on('keyup', function(){
        $('#permalink_description').val($('#details').val().substring(1, 150));
    });

  });
  </script>
@endpush
<!-- Input Validation end -->

@endsection