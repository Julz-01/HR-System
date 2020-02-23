@extends('admin/layouts/admin_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="col-sm-12">
              <h4 class="text-center text-dark">Request Log</h4>
            </div><!-- /.col -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
              @if (session('status'))
                        <div class="alert alert-success alert-sm" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif  

        <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <table class="table table-striped table-responsive-md">
        <thead>
          <tr>
            <th>Name</th>
            <th>Date of Leave</th>
            <th>Type of Leave</th>
            <th>Reason</th>
            <th>Actions</th>
            <th>Status</th>
           
          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td>
              {{$dt->name}}
            </td>
            <td>{{$dt->date}}</td>
            <td>{{$dt->type}}</td>
           <td>{{$dt->reason}}</td>
            @if($dt->status != 0)
            <td> </td>
            @else
            <td><a href="#" class="btn btn-primary btn-sm reqacc" data-names="{{$dt->name}}" data-types="{{$dt->type}}" data-ids="{{$dt->req_id}}"><i class="fa fa-check"></i></a> <a href="#" class="btn btn-danger btn-sm reqdec" data-ids="{{$dt->req_id}}" data-names="{{$dt->name}}" data-types="{{$dt->type}}"><i class="fa fa-times"></i></a> </td>
            @endif
           
            @if($dt->status == 1)
            <td><span class="badge bg-success">Accepted</span></td>
            @elseif($dt->status == 2)
            <td><span class="badge bg-danger">Declined</span></td>
            @else
            <td><span class="badge bg-secondary">Pending</span></td>
            @endif
         
          </tr>
         @endforeach
        </tbody>
      </table>
                  </div>
            {{$data->links()}}
                </div>
              </div>
         
  </div>
</section>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
