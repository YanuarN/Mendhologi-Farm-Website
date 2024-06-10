<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Mendhologi Farm</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
  
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/admin" class="nav-link">Home</a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
        </ul>
      </nav>
      <!-- /.navbar -->
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
      <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
      <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
      <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
      <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
      <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
      <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
      <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
      <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
      <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
      <script src="{{ asset('js/adminlte.js') }}"></script>
      <script src="{{ asset('js/demo.js') }}"></script>
      