@extends('user/layouts/user_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="col-sm-12">
              <h4 class="text-center text-dark">Request</h4>
            </div>
    </div>
       <section class="content">
     <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
           <div class="form-group">
            <form action="{{url('/send_request')}}" method="post">
         @csrf
           <label class="float-left">Leave Date</label>   
             <div class="cal-icon"> 
               
            <input type="text" name="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} datetimepicker" value="{{old('date')}}">
             @if ($errors->has('date'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('date') }}</strong>
                    </div>
                    @endif
          </div>
           </div>       
            <div class="form-group">
    <label class="float-left">Type of Leave</label>
    <select class="form-control form-control-md" name="type">
      <option value="Undertime">Undertime</option>
      <option value="Halfday">Halfday</option>
      <option value="Vacation Leave">Vacation Leave</option>
      <option value="Equipment Change">Equipment Change </option>
      <option value="Emergency Leave">Emergency Leave</option>
    </select>
  </div>
  <div class="form-group">
    <label class="float-left">Reason</label>
    <div class="panel panel-danger"> 
      <div class="panel-body"> 
     <textarea  name="reason" rows="8" cols="100" class="form-control{{ $errors->has('reason') ? ' is-invalid' : '' }}" style="width:100%;" required>
      </textarea> 
       @if ($errors->has('reason'))
                <div class="invalid-feedback text-danger">
                    <strong>{{ $errors->first('reason') }}</strong>
                </div>
                @endif
  </div> 
</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
    </div>
<div class="col-md-8">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                     <div class="table-responsive">
            <table class="table table-striped custom-table m-b-0">
                    <thead>
                        <tr>
                            
                            <th scope="col">Leave Date</th>
                            <th scope="col">Type of Leave</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Status</th>
                            <th scope="col">Note</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                        <tr>
                            
                            <?php
                            $date = str_replace('/','-',$dt->date)
                            ?>
                            <td>{{date('F d, o',strtotime($date))}}</td>
                            <td>{{$dt->type}}</td>
                            <td>{{$dt->reason}}</td>
                            @if($dt->status == 1)
                            <td><span class="badge bg-success">Approved</span></td>
                            @elseif($dt->status == 2)
                            <td><span class="badge bg-danger">Declined</span></td>
                            @else
                            <td><span class="badge bg-secondary">Pending</span></td>
                            @endif
                            <td>{{$dt->note}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
                </div>
              </div>
              <!-- /.card-body -->
         
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
