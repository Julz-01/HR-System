@extends('user/layouts/user_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(!empty($last->time_out) OR $last == NULL)
      <form action="{{ url('/time-in') }}" method="post">
 
          @csrf
        @else
        <form action="{{ url('/time-out').'/'.$last->id }}" method="post">

        @csrf
        @endif

               <div class="row">
                 <!-- left column -->
                 <div class="col-md-8">
                   <!-- general form elements -->
                   <div class="card card-primary">
                     <div class="card-header text-center"> <i class="fa fa-clock"> &nbsp;</i>
              Time Logs
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->

                       <div class="card-body">
                         <div class="row" style="display: flex; justify-content: center">
              
                <div><div class="clock"></div></div>
               
              </div>
              <div class="">
                @if(!empty($last->time_out) OR $last == NULL)
                  <button type="submit" class="btn  bg-gradient-primary swal-in" id="on">Time-In</button>
                  @else
                  <button type="submit" class="btn bg-gradient-secondary swal-out" id="off">Time-Out</button>
                  @endif
            </div>
            <hr>
            <table class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th class="text-center">Date</th>
                 <th class="text-center">Time-in</th>
                 <th class="text-center">Time-out</th>
                 <th class="text-center">Total Hour(s)</th>
               </tr>
               </thead>
               <tbody>
                 @foreach($data as $dt)
                 <tr>

                      <td class="text-center">{{date('F d, o',strtotime($dt->date))}}</td>
                      <td class="text-center">{{date('h:i A',strtotime($dt->time_in))}}</td>
                      @if(empty($dt->time_out))
                      <td></td>
                      @else
                      <td class="text-center">{{date('h:i A',strtotime($dt->time_out))}}</td>
                      @endif
                      <?php

                      ?>
                      <td align="center">{{$dt->time_total}}</td>
                    </tr>
               @endforeach
               </tfoot>
             </table>
             <br>
                  {{$data->links()}}
                       </div>
                       <!-- /.card-body -->
                   </div>
                   <!-- /.card -->
                 </div>
                 <!--/.col (left) -->
                 <!-- right column -->
                 <div class="col-md-4">
                   <!-- general form elements disabled -->
                   <div class="card card-primary">
                     <div class="card-header text-center">
                    <i class="fa fa-bullhorn">&nbsp;&nbsp;</i>ANNOUNCEMENTS
                     </div>
                     <!-- /.card-header -->
                     @foreach($announce as $anc)
                     <div class="card-body">
                         <div class="row">
                           <div class="col-sm-12">
                             <div class="form-group">
                               <textarea class="form-control" rows="7"  disabled>{{$anc->announce}}</textarea>
                             </div>
                           </div>
                         </div>
                   </div>
                 </div>
                 <!--/.col (right) -->
                 <div class="card card-primary">
                   <div class="card-header text-center">
                    <i class="fa fa-calendar">&nbsp;&nbsp;</i>EVENTS
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                       <div class="row">
                         <div class="col-sm-12">
                           <div class="form-group">
                             <textarea class="form-control"  rows="7" disabled>{{$anc->event}}</textarea>
                           </div>
                         </div>
                       </div>
                 </div>
               </div>
               @endforeach
               </div>
               <!-- /.row -->
             </div><!-- /.container-fluid -->
           </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
