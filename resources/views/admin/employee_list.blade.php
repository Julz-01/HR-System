@extends('admin/layouts/admin_app')

@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
                   <div class="card-header">
                     <h5 class="text-center">Employee List</h5>
                   </div>
                   <!-- /.card-header -->
                   <div class="row">
                     <div class="col-md-12">
                   <div class="card-body">
                     <table id="table1" class="table table-bordered table-striped table-responsive-md">
                       <thead>
                       <tr>
                         <th class="text-center">Name</th>
                         <th class="text-center">Linkserve Skype Account</th>
                         <th class="text-center">Mobile Number</th>
                         <th class="text-center">Address</th>
                         <th class="text-center">Action</th>
                       </tr>
                       </thead>
                       <tbody>
                         @foreach($data as $dt)
                       <tr>
                         <td class="text-center">{{$dt->name}}</td>
                         <td class="text-center">{{$dt->email}}
                         </td>
                         <td class="text-center">{{$dt->number}}</td>
                         <td class="text-center">{{$dt->address}}</td>
                         <td class="row">
<button class="btn btn-primary btn-sm ml-3" type="button" data-toggle="modal" data-target="#editmodal{{$dt->id}}"><i class="fas fa-edit"></i></button>
&nbsp;
<button class="btn btn-danger btn-sm destroy_form"   type="button" data-ids="{{$dt->id}}" data-names="{{$dt->name}}"><i class="fas fa-trash"></i></button>

                         </td>
                       </tr>
                       </tbody>
                       @endforeach
                       <tfoot>
                       </tfoot>
                     </table>
                   </div>
                   <!-- /.card-body -->
                 </div>
               </div>
             </div>
  </div>
</section>
  <!-- /.content-wrapper -->
  
@foreach($data as $dt)
<div class="modal fade" id="editmodal{{$dt->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Profile of {{$dt->name}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
                   <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Name <span class="text-danger">*</span></label>
                      <input class="form-control name{{$dt->id}}" type="text" name="name{{$dt->id}}" value="{{$dt->name}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">E-mail <span class="text-danger">*</span></label>
                      <input class="form-control email{{$dt->id}}" type="email" name="email{{$dt->id}}" value="{{$dt->email}}">
                    </div>
                  </div>
                 <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Mobile Number <span class="text-danger">*</span></label>
                      <input class="form-control number{{$dt->id}}" type="text" name="number{{$dt->id}}" value="{{$dt->number}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Address <span class="text-danger">*</span></label>
                      <input class="form-control address{{$dt->id}}" type="text" name="address{{$dt->id}}" value="{{$dt->address}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">SSS <span class="text-danger">*</span></label>
                      <input class="form-control sss{{$dt->id}}" type="text" name="sss{{$dt->id}}" value="{{$dt->sss}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Tin <span class="text-danger">*</span></label>
                      <input class="form-control tin{{$dt->id}}" type="text" name="tin{{$dt->id}}" value="{{$dt->tin}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Phil Health <span class="text-danger">*</span></label>
                      <input class="form-control philhealth{{$dt->id}}" type="text" name="philhealth{{$dt->id}}" value="{{$dt->philhealth}}">
                    </div>
                  </div>
              
                <div class="col-sm-6">    
                    <div class="form-group">
                      <label class="control-label">HDMF <span class="text-danger">*</span></label>
                      <input class="form-control hdmf{{$dt->id}}" type="text" name="hdmf{{$dt->id}}" value="{{$dt->hdmf}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                      <label class="control-label">Birth Date <span class="text-danger">*</span></label>
                      <input class="form-control birthdate{{$dt->id}}" type="text" name="birthdate{{$dt->id}}" value="{{$dt->birthdate}}">
                    </div>
              </div>
               <div class="col-sm-6">
                     <div class="form-group">
                      <label class="control-label">Employment Date <span class="text-danger">*</span></label>
                      <input class="form-control employment_date{{$dt->id}}" type="text" name="employment_date{{$dt->id}}" value="{{$dt->employment_date}}">
                    </div>
              </div>
              <div class="col-sm-6">
                     <div class="form-group">
                      <label class="control-label">Nationality <span class="text-danger">*</span></label>
                      <input class="form-control nationality{{$dt->id}}" type="text" name="nationality{{$dt->id}}" value="{{$dt->nationality}}">
                    </div>
              </div>
              <div class="col-sm-6">
                     <div class="form-group">
                      <label class="control-label">Civil Status <span class="text-danger">*</span></label>
                      <input class="form-control civil_status{{$dt->id}}" type="text" name="civil_status{{$dt->id}}" value="{{$dt->civil_status}}">
                    </div>
              </div>
            </div>
             </div>
            <div class="modal-footer float-right bg-primary">
              <button type="button" class="btn btn-light btn-md update_form" data-ids="{{$dt->id}}" data-users="{{$dt->name}}">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
  @endforeach
@endsection
