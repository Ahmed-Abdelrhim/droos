<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <title>Droos</title>
    @include('admin.frontend.partials._head')
    @include('admin.frontend.components.custom_style')
</head>
<!-- END: Head-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click"
      data-menu="vertical-menu-modern" data-col="">
    @include('admin.frontend.components.header')
    @include('admin.frontend.components.main-menu')
         @yield('main-content')
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('admin.frontend.partials._footer')
    @include('admin.frontend.partials._scripts')
</body>
</html>
