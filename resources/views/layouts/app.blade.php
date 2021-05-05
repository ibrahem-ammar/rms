<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'reports-system') }}</title>

    @yield('styles')

    <!-- Bootstrap 4.6 RTL -->
    <link rel="stylesheet" href=" {{ asset('adminlte/plugins/bootstrap-4.6.0-rtl/css/bootstrap-rtl.min.css') }} ">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=" {{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('adminlte/dist/css/adminlte.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('adminlte/dist/css/skin-blue.min.css') }} ">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="hold-transition skin-blue sidebar-mini" >
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts._includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts._includes.sidemenu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts._includes.content_header')
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('layouts._includes.footer')
        <!-- /.Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=" {{ asset('adminlte/plugins/jquery/jquery.min.js') }} "></script>
    <!-- Bootstrap 4 -->
    <script src=" {{ asset('adminlte/plugins/bootstrap-4.6.0-rtl/js/bootstrap.min.js') }} "></script>

    @stack('scripts')

    <!-- AdminLTE App -->
    <script src=" {{ asset('adminlte/dist/js/adminlte.min.js') }} "></script>

</body>
</html>
