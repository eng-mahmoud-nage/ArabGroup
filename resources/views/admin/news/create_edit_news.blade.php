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
                   @section('name')
                      {{__('اضافه خبر')}}
                    @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">

                @else
                   {{-- @dd('update') --}}
                   @section('name')
                      {{__('تعديل خبر')}}
                   @endsection
                    <form class="form-horizontal" id="quickForm" method="POST" action="{{route('news.update', $record->id)}}" enctype="multipart/form-data">
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

                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <h5>{{__('الوصف')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <textarea  type="text" name="description" class="textarea form-control @error('description') is-invalid @enderror" @if(!$record->description) required @endif autocomplete="off">
                            {{$record->description}}
                      </textarea>
                        @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-6">
                <div class="input-group control-group increment" >
                <input type="file" name="sources[]" class="form-control" multiple />
                  {{-- <div class="input-group-btn"> 
                    <button class="btn btn-success add" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  </div> --}}
                </div>
                </div>
              </div>
              <br>
              <div class="row">
                @if ($record->title)
                  @foreach ($record->images as $image)
                  <div class="col-2 img">
                    <img src="{{url('/news/images').'/'.$image->source}}" width="100" height="100" alt="image">
                    <a href="" style="color:red; position: absolute; top:-13px; right:45px" class="btn btn-link delete_img" data-new_id="{{$record->id}}" data-img_id="{{$image->id}}">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                  @endforeach
                  @endif
                  
                {{-- @if ($record->images)
                @foreach ($record->images as $image)
                <div class="clone">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="sources[]" class="form-control"  value="123" accept="image/png, image/jpg, image/gif">
                    
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div>
                </div>
                @endforeach
           
    
                @else
                <div class="clone" style="display: none">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="sources[]" class="form-control" accept="image/png, image/jpg, image/gif">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div>
                </div>

                @endif
                 --}}
        </div>
        <br>

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





$('.delete_img').on('click', function(e){
    e.preventDefault();
    let new_id = $(this).data('new_id');
    let img_id = $(this).data('img_id');
    console.log(new_id,img_id);

        if(confirm("Are you sure you want to delete this iamge?")){
            $.ajax({
                type : 'DELETE',
                url : '{{url("admin/destroyImage")}}',
                data : {
                    'new_id' : new_id,
                    'img_id' : img_id,
                    _token: '{{csrf_token()}}'
                },
                success : function(data){
                  console.log(data.data);
                  $(this).parents('.img').slideUp().remove();
                }.bind(this)
            })
        }
    });
});

  </script>
@endpush
<!-- Input Validation end -->

@endsection


{{-- // $(function() {
//     $('.delete_img').click(function() {
//         var new_id = $(this).data('new_id');
//         var img_id = $(this).data('img_id');
//         console.log(new_id, img_id);
//          $.ajax({
//             type: "GET",
//             dataType: "json",
//             url: '{{url("admin/destroyImage")}}',
//             data: {'id': new_id, 'img_id': img_id},
//             success: function(data){
//               console.log(data.success)
//             }
//         });
//     });
//   });
// }); --}}