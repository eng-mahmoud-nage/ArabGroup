@extends('admin.dashboard')

@section('title')
    {{__('الرسائل البريديه')}}
@endsection

@section('content')

<div class="card">

        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>{{__('الاسم')}}</th>
              <th>{{__('البريد الالكترونى')}}</th>
              <th>{{__('الموضوع')}}</th>
              <th>{{__('الرساله')}}</th>
              <th>{{__('الاجراءات')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{{$record->name}}</td>
                  <td>{{$record->email}}</td>
                  <td>{{$record->subject}}</td>
                  <td> 
                  <!-- Button trigger modal -->
                        {{substr($record->massage,0,20)}} ...
                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                        More
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">{{$record->subject}}</h5>
                              <button type="button" class="close float-md-right" data-dismiss="modal" aria-label="Close">
                                <span  aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              {{$record->massage}}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </td>
                    <td>
                      <div style="display:inline-flex d-none" >
                    
                    <form action="{{route('contact.destroy', $record->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                       
                            <button class="delete" onclick="return confirm('are you sure?')" class="" style="background: none;border: none;color: red; display:inline-flex">
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
              <th>{{__('E mail')}}</th>
              <th>{{__('Subject')}}</th>
              <th>{{__('Massage')}}</th>
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
</script>
@endpush
