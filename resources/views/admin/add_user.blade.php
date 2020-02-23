@extends('admin/layouts/admin_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="col-sm-12">
              <h4 class="text-center text-dark">Add New User</h4>
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
         
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <form action="{{url('/add-user')}}" method="POST">
                        @csrf
                      <label class="control-label">Name <span class="text-danger">*</span></label>
                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">E-mail <span class="text-danger">*</span></label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                 <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Password <span class="text-danger">*</span></label>
                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Confirm password <span class="text-danger">*</span></label>
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="col-md-11 col-lg-11 col-sm-6">
                               
                            </div>
               
                  <div class="col-md-1 col-lg-1 col-sm-6">

                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    {{ __('Register') }}
                                </button>
                            </div>
                               </div>
                             </form>
                  </div>
                </div>
              </div>
         
  </div>
</section>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
