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
                     <h5 class="text-center">Admin List</h5>
                   </div>
                   <!-- /.card-header -->
                   <div class="row">
                     <div class="col-md-12">
                   <div class="card-body">
                     <table class="table table-bordered table-striped datatable">
                       <thead>
                       <tr>
                         <th>Name</th>
                         <th>Type</th>
                         <th>Linkserve Skype Account</th>
                         <th>Mobile Number</th>
                         <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                         @foreach($data as $dt)
                       <tr>
                         <td>{{$dt->name}}</td>
                         <td>{{$dt->type}}
                         </td>
                         <td>{{$dt->email}}</td>
                         <td> 4</td>
                         <td>action</td>
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
</div>
<!-- ./wrapper -->
@endsection
