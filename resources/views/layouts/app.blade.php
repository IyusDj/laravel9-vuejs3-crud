<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel9-Vuejs3-CRUD</title>

    <!-- Style -->
    @include('includes.style')

  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

      <!-- Navbar -->
      @include('includes.nav')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('includes.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" id="app">

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      @include('includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('includes.script')
  </body>
</html>
