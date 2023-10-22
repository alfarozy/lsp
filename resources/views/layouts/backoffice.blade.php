<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') }} | @yield('title')</title>

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
    <link rel="stylesheet" href="/backoffice/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @toastr_css
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
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
        @if (Auth()->guard('asesor')->check())
            @include('layouts.backoffice.sidebar-asesor')
        @elseif(Auth()->guard('siswa')->check())
            @include('layouts.backoffice.sidebar-siswa')
        @else
            @include('layouts.backoffice.sidebar')
        @endif

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="#" class="text-muted">Pasamandev</a></strong>
            <div class="float-right d-none d-sm-inline-block">
                <span class="text-muted">Powered by
                    <img src="/backoffice/dist/img/logo/bait.svg" alt="" srcset="">
                </span>
            </div>
        </footer>

        <div class="modal fade" id="delete" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-white">
                        <h4 class="modal-title">Yakin ingin menghapus data ?</h4>
                    </div>
                    <form action="#" id="delete-form" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-body border-white ">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal"><i
                                        class="fa fa-arrow-left"></i> Batal</button>
                                <button type="submit" class="btn btn-danger mx-2 ">Hapus sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

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
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="/backoffice/plugins/flot/plugins/jquery.flot.pie.js"></script>
    @jquery
    @toastr_js
    @toastr_render
    @yield('script')
    <script>
        $(document).ready(function() {

            // $('.datatable').DataTable({
            //     "ordering": false,
            //     "info": true,
            //     "autoWidth": true,
            //     "responsive": true,
            // });
            $('.input-img').change(function() {
                const file = this.files[0];
                if (file && file.name.match(/\.(jpg|jpeg|png|svg)$/)) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('.image-preview').attr('src', event.target.result)
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert('please upload image file');
                }
            });
            $('.btn-delete').click(function() {
                const action = $(this).data('action')
                $('#delete-form').attr('action', action)
            })

            $('.custom-file-input').on('change', function() {
                let filename = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(filename)
            });

            //> select 2
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <script>
        $(function() {

            /*
             * DONUT CHART
             * -----------
             */

            var donutData = [{
                    label: 'Series2',
                    data: 30,
                    color: '#3c8dbc'
                },
                {
                    label: 'Series3',
                    data: 20,
                    color: '#0073b7'
                },
                {
                    label: 'Series4',
                    data: 50,
                    color: '#00c0ef'
                }
            ]
            $.plot('#donut-chart', donutData, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.5,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                        }

                    }
                },
                legend: {
                    show: false
                }
            })
            /*
             * END DONUT CHART
             */

        })

        /*
         * Custom Label formatter
         * ----------------------
         */
        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
                label +
                '<br>' +
                Math.round(series.percent) + '%</div>'
        }
    </script>
</body>

</html>
