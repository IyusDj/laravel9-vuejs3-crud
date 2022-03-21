<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel9-Vuejs3-CRUD</title>

    <!-- Style -->
    @include('includes.style')

  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

      <!-- Navbar -->
      {{-- @include('includes.nav') --}}
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      {{-- @include('includes.sidebar') --}}

      <!-- Content Wrapper. Contains page content -->
      {{-- <div class="content-wrapper"> --}}
        <!-- Main content -->
        {{-- <div class="content"> --}}
          <router-view/>
        {{-- </div> --}}
        <!-- /.content -->
      {{-- </div> --}}
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      {{-- @include('includes.footer') --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('includes.script')
  </body>
</html>
