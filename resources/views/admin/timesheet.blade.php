@extends('admin/layouts/admin_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="col-sm-12"> 
              <h4 class="text-center text-dark">User Timesheet</h4>
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
              <div class="col-md-12 col-lg-4 col-sm-12 col-xs-12 mb-2">
                <form action="{{url('/user/timesheet')}}" method="POST">
                  @csrf
                   <select name="entry" class="form-control" onchange="this.form.submit()">
      @if($entry == 'all'){
<option>{{$entry}}</option>
<option value="today">today</option>
<option value="yesterday">yesterday</option>
<option value="last entries">last entries</option>
}
@elseif($entry == 'today'){
<option>{{$entry}}</option>
<option value="all">all</option> 
<option value="yesterday">yesterday</option>
<option value="last entries">last entries</option>
}
@elseif($entry == 'yesterday'){
<option>{{$entry}}</option>
<option value="all">all</option>
<option value="today">today</option>
<option value="last entries">last entries</option>
}
@elseif($entry == 'last entries'){
<option>{{$entry}}</option>
<option value="all">all</option>
<option value="today">today</option>
<option value="yesterday">yesterday</option>
}
@else{
<option value="all">all</option>
<option value="today">today</option>
<option value="yesterday">yesterday</option>
<option value="last entries">last entries</option>
}
@endif
    </select>
               </form>
              </div>
              <div class="col-md-12 col-lg-4 col-sm-12 col-xs-12 mb-2">
                <button class="btn btn-primary btn-block btn-md" id="button-excel">Convert to Ecxel</button>

              </div>
              <div class="col-md-12 col-lg-4 col-sm-12 col-xs-12 mb-2">
                <button class="btn btn-danger btn-block btn-md truncate" type="submit">Delete All</button>
              </div>
             </div>   
          <table class="table table-striped table-responsive-md exceltable">
        <thead>
          <tr>
            <th>Name</th>
            <th class="text-center">Date</th>
            <th class="text-center">Time-in</th>
            <th class="text-center">Time-out</th>
            <th class="text-right">Total Hour(s)</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td>{{$dt->user_name}}</td>
            <td class="text-center">{{date('F d, o',strtotime($dt->date))}}</td>
            <td class="text-center">{{date('h:i A',strtotime($dt->time_in))}}</td>
             @if(empty($dt->time_out))
             <td></td>
             @else
             <td class="text-center">{{date('h:i A',strtotime($dt->time_out))}}</td>
            @endif
            <td class="text-right">{{$dt->time_total}}</td>
            <td></td>
          </tr>
         @endforeach
        </tbody>
      </table>
                  </div>
                </div>
              </div>
         
  </div>
</section>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
