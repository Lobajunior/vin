<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SELON TOI | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../Backend/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('../Backend/dist/css/sweetalert.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/summernote/summernote-bs4.min.css') }}">

   <!-- Select2 -->
   <link rel="stylesheet" href="{{ asset('../Backend/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../Backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('../Backend/plugins/summernote/summernote-bs4.min.css') }}">

  @livewireStyles

  <style>
    #btnPromotion {
      animation: blinker-success 1.5s linear infinite;
    }

    @keyframes  blinker-success {
      50% {
        opacity: 0;
      }
    }
  </style>
</head>
<body class="sidebar-mini sidebar-collapse">
<div class="wrapper">

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('../Backend/dist/img/Jiam_s5-removebg-preview.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>


@include('../Backend/partials/navbar')

@yield('content')


@include('../Backend/partials/footer')


<div class="return_div_modal"></div>


  </div>
<!-- ./wrapper -->
@livewireScripts
<!-- jQuery -->
<script src="{{ asset('../Backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('../Backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../Backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('../Backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('../Backend/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('../Backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('../Backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('../Backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('../Backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('../Backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('../Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('../Backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('../Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../Backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../Backend/dist/js/demo.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('../Backend/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('../Backend/dist/js/sweetalert-data.js') }}"></script>
<script src="{{ asset('../Backend/dist/js/sweetalert.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('../Backend/dist/js/pages/dashboard.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('../Backend/plugins/summernote/summernote-bs4.min.js') }}"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

    </script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

  })
</script>


<script>
		
    $(document).on("click",".MonModalGetDescription", function(e){
  
       e.preventDefault();
       var a=$(this);
       $('.return_div_modal').text("");
       $.ajax({
           method: 'get',
           url: a.attr("href"),
           success : function(response){
               $('.return_div_modal').html(response);
               $('.EditDescription').modal('show');
           }
       });
   });
    </script>

@yield('Scripts')
</body>
</html>
