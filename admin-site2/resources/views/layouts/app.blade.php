<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  

  <title>@yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href='{{ asset("dependencies/fontawesome/css/all.min.css" ) }}'>
  <!-- Styles -->
  <link href="{{ asset('dependencies/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href='{{asset('dependencies/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}'>
   <!-- style -->
   <link rel="stylesheet" href='{{asset('assets/css/style.css')}}'>
   
</head>
<body>

@include('../components/navbar')
<main class="py-4">
    <div class='container-fluid'>
        <div class='row justify-content-center'>
            <div class='col-md-10'>
                @yield('content')
            </div>
        </div>
    </div>
</main>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src= {{ asset( "dependencies/js/jquery-3.5.1.min.js" )}}></script>
<!-- Bootstrap -->
<script src= {{ asset( "dependencies/dist/js/bootstrap.bundle.min.js" )}}></script>
<!-- DataTables -->
<script src="{{ asset('dependencies/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('dependencies/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!--custom script-->
<script src="{{ asset('assets/js/script.js')}}"></script>
@yield('script')
</body>

</html>