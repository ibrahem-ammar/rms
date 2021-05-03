<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'reports-system') }}</title>

    @yield('styles')

    <link rel="stylesheet" href="  {{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="  {{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/themes/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/themes/classic.date.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/themes/rtl.css') }}" rel="stylesheet">
    <!-- Sweetalert 2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=" {{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('adminlte/dist/css/adminlte.min.css') }} ">


</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper">

<!-- Navbar -->
@include('layouts._includes.navbar')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('layouts._includes.sidemenu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('site.' . request()->segment(1))</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- @php
                            $url = request()->segments();
                        @endphp
                        @foreach ( $url as $segment)
                        <li class="breadcrumb-item"><a href="{{ route( $loop->index == 0 ? $segment . '.index' : '' ) }}">@lang('site.'.$segment)</a></li>
                        @endforeach --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @yield('content')

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('layouts._includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=" {{ asset('adminlte/plugins/jquery/jquery.min.js') }} "></script>
    <!-- Bootstrap 4 -->
    <script src=" {{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

    <script src="{{asset('adminlte/plugins/select2/js/select2.min.js')}}"></script>

    {{-- Date Picker --}}
    <script src="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/picker.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/picker.date.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/translations/ar.js') }}"></script>


    <!-- Sweetalert 2 -->

    <script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    @yield('scriptlinks')

    <!-- AdminLTE App -->
    <script src=" {{ asset('adminlte/dist/js/adminlte.min.js') }} "></script>

    @stack('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.select2').select2({
                dir: "ltr",
                theme: 'bootstrap4'
            })
        });
    </script> --}}

</body>
</html>
