<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->

    <!-- Meta -->
    <meta name="description" content="Dinas Perhubungan">
    <meta name="author" content="Bintang">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/logo-dishub.jpg">

    <title>Dinas Perhubungan Padang Panjang</title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/dashforge/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/dashforge/lib/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.demo.css">



    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
    <link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.dashboard.css">
    <link id="dfMode" rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/skin.light.css">
</head>
@include('panel.modalMenu')
@if(isset($body))
    <body class="{{ $body }}" style="margin-bottom: 150px">
    @else
        <body class="page-profile" style="margin-bottom: 150px">
@endif
