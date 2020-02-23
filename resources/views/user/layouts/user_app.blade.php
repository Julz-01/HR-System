<!DOCTYPE html>
<html lang="en">

<head>

@include('user/layouts/head')

</head>


<body>
  @include('user/layouts/sidebar')
  @include('user/layouts/topbar')

  @section('content')
@show



@include('user/layouts/aside')

</body>

@include('user/layouts/scripts')
@include('user/layouts/footer')


</html>
