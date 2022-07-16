<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">


    <link rel="stylesheet" href="{{ asset('') }}backend/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('') }}backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('') }}backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <link rel="stylesheet" href="{{ asset('') }}backend/password/passtrength.css" media="screen" title="no title">

    <link rel="stylesheet" href="{{ asset('') }}backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}backend/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('') }}backend/dist/css/adminlte.min2167.css">

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }












        #img-preview {
            display: none;
            width: 100%;
            border: 2px dashed rgb(0, 116, 35);
            margin-bottom: 0px;
        }

        #img-preview img {
            width: 100%;
            height: auto;
            display: block;
        }

        [type="file"] {
            height: 0;
            width: 0;
            overflow: hidden;
        }

        [type="file"]+label {
            font-family: sans-serif;
            background: #0082ec;
            padding: 10px 30px;
            border: 2px solid #00aa17;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            transition: all 0.2s;
        }

        [type="file"]+label:hover {
            background-color: #fff;
            color: #007510;
        }
    </style>


</head>






<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('') }}backend/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        @include('backend.dashboard.layouts.nav')


        @include('backend.dashboard.layouts.side-menu')




        <div class="content-wrapper">







            @include('backend.dashboard.layouts.breadcrumb')


            @section('main-content')

            @show













        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>





    <script src="{{ asset('') }}backend/plugins/jquery/jquery.min.js"></script>

    <script src="{{ asset('') }}backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('') }}backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('') }}backend/dist/js/adminlte.min2167.js"></script>

    <script src="{{ asset('') }}backend/dist/js/demo.js"></script>


    <script type="text/javascript" src="{{ asset('') }}backend/password/jquery.passtrength.js"></script>

    <script src="{{ asset('') }}backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script src="{{ asset('') }}backend/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ asset('') }}backend/plugins/toastr/toastr.min.js"></script>










    {{-- // custom js --}}
    <script src="{{ asset('') }}backend/custom/js/functions.js"></script>
    <script src="{{ asset('') }}backend/custom/js/permission.js"></script>
    <script src="{{ asset('') }}backend/custom/js/admin-users.js"></script>
    <script src="{{ asset('') }}backend/custom/js/role.js"></script>
</body>



</html>
