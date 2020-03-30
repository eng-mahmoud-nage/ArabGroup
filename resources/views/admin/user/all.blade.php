@extends('admin.dashboard')

@section('title')
    {{__('العملاء')}}
@endsection

@section('content')

<div class="card">
        {{-- <div class="card-header">
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>{{__('الاسم')}}</th>
              <th>{{__('البريد الالكترونى')}}</th>
              <th>{{__('الموبايل')}}</th>
              <th>{{__('اسم المستخدم')}}</th>
              <th>{{__('الحاله')}}</th>
              <th>{{__('الاجراءات')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{{$record->name}}</td>
                  <td>{{$record->email}}</td>
                  <td>{{$record->phone}}</td>
                  <td>{{$record->user_name}}</td>
                  <td>
                    <input data-id="{{$record->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $record->active ? 'checked' : '' }}>
                  </td>
                    <td>
                      <div style="display:inline-flex">
                        {{-- <a class="edit" href="{{route('user.edit', $record->id)}}" style="padding: 0 5px">
                        <i class="fas fa-user-edit"></i>
                    </a> --}}
                    <form action="{{route('user.destroy', $record->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                       
                            <button class="delete" onclick="return confirms()" class="" style="background: none;border: none;color: red; display:inline-flex">
                                <i class="fas fa-trash-alt" ></i>
                            </button>
                    </form>
                    </div>
                    </td>
                </tr> 
              @endforeach
          
            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>{{__('Name')}}</th>
              <th>{{__('E-mail')}}</th>
              <th>{{__('Phone')}}</th>
              <th>{{__('User Name')}}</th>
              <th>{{__('Status')}}</th>
              <th>{{__('Action')}}</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->



@endsection

@push('scripts')
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

    $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         console.log(status);
         $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{url("admin/changeStatus")}}',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
    })

</script>
@endpush
