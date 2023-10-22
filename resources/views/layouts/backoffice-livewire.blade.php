<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') }} | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backoffice/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/backoffice/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/backoffice/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/backoffice/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backoffice/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/backoffice/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/backoffice/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/backoffice/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/backoffice/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/backoffice/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/backoffice/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/backoffice/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/backoffice/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @livewireStyles
    <style>
        .chose {
            cursor: pointer;
            color: #28a745;
        }

        .chose:hover {
            background: #28a7463b;
            animation: 0.8
        }

    </style>
</head>

<body
    class="hold-transition sidebar-mini layout-fixed {{ request()->routeIs('employes-evaluation.evaluation') ? 'sidebar-collapse sidebar-closed' : '' }} ">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @if (Auth()->user()->role == 'admin')
            @include('layouts.backoffice.admin-sidebar')
        @else
            @include('layouts.backoffice.sidebar')
        @endif

        <!-- Content Wrapper. Contains page content -->
        {{ $slot }}
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="#" class="text-muted">Pasamandev</a></strong>
            <div class="float-right d-none d-sm-inline-block">
                <span class="text-muted">Powered by
                    <img src="/backoffice/dist/img/logo/bait.svg" alt="" srcset="">
                </span>
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/backoffice/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/backoffice/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/backoffice/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/backoffice/plugins/sparklines/sparkline.js"></script>

    <!-- daterangepicker -->
    <script src="/backoffice/plugins/moment/moment.min.js"></script>
    <script src="/backoffice/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/backoffice/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/backoffice/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/backoffice/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    {{-- <script src="/backoffice/dist/js/adminlte.js"></script> --}}


    {{-- <script src="/backoffice/plugins/jquery/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="/backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/backoffice/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/backoffice/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->

    <!-- data table -->
    <script src="/backoffice/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/backoffice/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/backoffice/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/backoffice/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/backoffice/plugins/flot/jquery.flot.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="/backoffice/plugins/flot/plugins/jquery.flot.resize.js"></script>
    <script src="/backoffice/plugins/toastr/toastr.min.js"></script>
    <script src="/backoffice/plugins/select2/js/select2.full.min.js"></script>

    @livewireScripts
    @stack('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.on('showModal', (id) => {
                id = '#' + id;
                $(id).modal('show')
            });
            Livewire.on('closeModal', (id) => {
                id = '#' + id;
                $(id).modal('hide')
            });
            Livewire.on('msg', (param) => { //flashMessage
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "600",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr[param['type']](param['msg'], param['title'])
            });
        });

        $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                let filename = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(filename)
            });

        });
    </script>

</body>

</html>
