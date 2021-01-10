<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title> @yield('title') </title>

    <!-- Favicons -->
    <link href="{{asset('assets')}}/admin/img/favicon.png" rel="icon">
    <link href="{{asset('assets')}}/admin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets')}}/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="{{asset('assets')}}/admin/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/style-responsive.css" rel="stylesheet">
    <script src="{{asset('assets')}}/admin/lib/chart-master/Chart.js"></script>

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
    @yield('css')
    @yield('javascript')
</head>

<body>
<section id="container">
    @include('admin._header')
    @include('admin._sidebar') //stabil
    @yield('content')
    @include('admin._footer')
    @yield('footer')

</body>
</html>
