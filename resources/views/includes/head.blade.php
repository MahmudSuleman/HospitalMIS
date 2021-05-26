<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <meta name="description" content="final year project">
    <meta name="author" content="Mahmud Suleman Sheikh Wunnam">
    <meta name="keyword" content="">

    <title>Hospital MIS | </title>

    <!-- Theme icon -->
    <link rel="shortcut icon" href="{{asset('/syntra/assets/images/favicon.ico')}}">

    <link href="{{asset('/syntra/assets/plugins/morris-chart/morris.css')}}" rel="stylesheet">
    <!-- Theme Css -->
    <link href="{{asset('/syntra/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/syntra/assets/css/slidebars.min.css')}}" rel="stylesheet">
    <link href="{{asset('/syntra/assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('/syntra/assets/css/menu.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/syntra/assets/css/style.css')}}" rel="stylesheet">


    <!-- Responsive and DataTables -->
    <link href="{{asset('/syntra/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/syntra/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/syntra/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Styles -->
{{--    <link href="{{ resource_path('css/app.css') }}" rel="stylesheet">--}}
</head>
<body class="sticky-header">
<section>
