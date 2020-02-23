<!DOCTYPE html>
<html lang="en">

<head>

@include('admin/layouts/head')

</head>


<body>
  @include('admin/layouts/sidebar')
  @include('admin/layouts/topbar')

  @section('content')
@show



@include('admin/layouts/aside')

</body>

@include('admin/layouts/scripts')
@include('admin/layouts/footer')


</html>
