<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8"/>
    <title>Strip Sync - V2 Beta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/metismenu.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>

    <script src="/assets/js/modernizr.min.js"></script>

    @yield('styles')

  </head>
  <body>
    <!-- Begin page -->
    <div id="wrapper">

      <!-- Top Bar Start -->
    @include('templates.topbar')
    <!-- Top Bar End -->

      <!-- ========== Left Sidebar Start ========== -->
    @include('templates.sidebar')
    <!-- Left Sidebar End -->


      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->

      <div class="content-page" id="app">

        @yield('content')

        @include('templates/copyright')

      </div>

      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
    </div>


    <!-- jQuery  -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/metisMenu.min.js"></script>
    <script src="/assets/js/waves.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>

    <!-- Counter js  -->
    <script src="/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="/plugins/counterup/jquery.counterup.min.js"></script>

    <!--C3 Chart-->
    <script type="text/javascript" src="/plugins/d3/d3.min.js"></script>
    <script type="text/javascript" src="/plugins/c3/c3.min.js"></script>

    <!--Echart Chart-->
    <script src="/plugins/echart/echarts-all.js"></script>

    <!-- Dashboard init -->
    <script src="/assets/pages/jquery.dashboard.js"></script>

    <!-- App js -->
    <script src="/assets/js/jquery.core.js"></script>
    <script src="/assets/js/jquery.app.js"></script>

    @yield('scripts')

    <script>
      window.translationMessages = {!!  json_encode(trans('front')) !!};
    </script>

    <script src="{{ mix('/js/app.js') }}"></script>
  </body>
</html>
