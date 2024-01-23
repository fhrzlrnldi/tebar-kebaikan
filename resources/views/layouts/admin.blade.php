<!---------------------------------------------
            AAADDMINNNNNNN TEMPLATE
------------------------------------------------>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tebar Kebaikan</title>
  {{-- <title>{{ admin.name }} - @yield('title')</title> --}}

  <!--
    CSS ADMIN
-->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{ asset ('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset ('assets/admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">


   <!-- jQuery -->
 <script src="{{ asset ('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset ('assets/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

  @stack('css_vendor')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('assets/admin/dist/css/adminlte.min.css')}}">
  @stack('css')



</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset ('assets/img/logo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

<!-- Navbar -->
{{-- @includeIf('layouts.partials.headeradmin')
<!-- /.navbar --> --}}
{{-- @include('layouts.partials.headeradmin') --}}
<!-- /.navbar -->

<!-- Main Sidebar Container -->
{{-- @includeIf('layouts.partials.sidebaradmin') --}}
<!--
    JAVASCRIPT ADMIN
-->
@include('layouts.partials.sidebaradmin')

@yield('body')




<script src="{{ asset ('assets/admin/plugins/toastr/toastr.min.js')}}"></script>


<!-- Preloader -->



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset ('assets/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset ('assets/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset ('assets/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset ('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('assets/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('assets/admin/plugins/moment/moment.min.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset ('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

@stack('scripts_vendor')
@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
  alert('{{ $error }}')
</script>
@endforeach
@endif
@if (session()->has('success'))
    <script>
      alert('{{ session('success') }}')
    </script>
@endif
<!-- AdminLTE App -->
<script src="{{ asset ('assets/admin/dist/js/adminlte.js')}}"></script>

<script>
  $('.custom-file-input').on('change', function() {
      let filename = $(this).val().split('\\').pop();
      $(this)
      .next('.custom-file-label')
      .addClass('selected')
      .html(filename);
  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function preview(target, image) {
    $(target)
        .attr('src', window.URL.createObjectURL(image))
        .show();
  }
</script>

@stack('scripts')



</body>
</html>



