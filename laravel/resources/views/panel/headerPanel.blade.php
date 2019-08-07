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
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/dashforge/assets/img/favicon.png">

    <title>Dishub</title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/dashforge/assets/fontawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/dashforge/lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
    <link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.dashboard.css">
</head>
@if(isset($body))
    <body class="{{ $body }}">
    @else
        <body class="page-profile">
@endif