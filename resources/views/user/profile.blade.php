@extends('user/layouts/user_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="col-sm-12">
              <h4 class="text-center text-dark">Personal Profile</h4>
            </div><!-- /.col -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
       <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('plugin-img/user-rounded.png')}}"
                       alt="User profile picture">
                </div>
                  @foreach($data as $dt)
                <h3 class="profile-username text-center">{{$dt->name}}</h3>

                <p class="text-muted text-center">{{$dt->department}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Contact Number</b> <br>
                    <a class="float-left">{{$dt->number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>E-mail</b> 
                    <br>
                    <a class="float-left">{{$dt->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> 
                    <br>
                    <a class="float-left">{{$dt->address}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
<div class="col-md-8">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="text-center"><i class="fas fa-chalkboard-teacher">&nbsp;&nbsp;</i>Employee Information</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                <strong>TIN Number:</strong>
                <p class="text-muted">
               {{$dt->tin}}
                </p>
            
                <strong>SSS Number:</strong>
                <p class="text-muted">{{$dt->sss}}</p>
             
              </div>
        
              <div class="col-md-6">
                <strong></i>Philihealth:</strong>
                <p class="text-muted">
                  {{$dt->philhealth}}
                </p>
                <strong>HDMF Number:</strong>
                <p class="text-muted">{{$dt->hdmf}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
               
                <strong>Employment Date:</strong>
                <p class="text-muted">{{$dt->employment_date}}</p>
            </div>
            <div class="col-md-6">
             
                <strong>Birth Date:</strong>
                <p class="text-muted">{{$dt->birthdate}}</p>  
            </div>
              </div>
              <!-- /.card-body -->
              @endforeach
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
