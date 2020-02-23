@extends('admin/layouts/admin_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="col-sm-12">
              <h4 class="text-center text-dark">Announcement and Event</h4>
            </div><!-- /.col -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 col-lg-6">
          <!-- general form elements disabled -->
          <div class="card card-primary">
            <div class="card-header text-center">
           <i class="fa fa-bullhorn">&nbsp;&nbsp;</i>ANNOUNCEMENT
            </div>
            <!-- /.card-header -->
            <form action="{{url('admin/update/announce')}}" method="POST">
              @csrf
              @method('PUT')
            <div class="card-body">
                <div class="row">
                  @foreach($data as $dt)
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="announce" rows="7">{{$dt->announce}}</textarea>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <!--/.col (right) -->
        <div class="card card-primary">
          <div class="card-header text-center">
           <i class="fa fa-calendar">&nbsp;&nbsp;</i>EVENT
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <textarea class="form-control" name="event" rows="7">{{$dt->event}}</textarea>
                  </div>
                </div>
              </div>
              @endforeach
        </div>
      </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    </div>
  <div class="col-md-4 text-center">
  <button class="btn btn-block btn-outline-primary swalDefaultSuccess">Update</button>
</div>
<div class="col-md-4">
</div>
</div>
</form>
  <div>
</section>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
