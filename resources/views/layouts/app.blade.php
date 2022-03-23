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
          <router-view/>
    </div>

    <!-- Scripts -->
    @include('includes.script')
  </body>
</html>
