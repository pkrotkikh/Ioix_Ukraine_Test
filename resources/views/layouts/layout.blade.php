<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Welcome to IoixUkraine test task.">
    <meta name="keywords" content="IoixUkraine test task">
    <meta name="author" content="Pavel Krotkikh">

    <title>@yield('title') | IoixUkraine test task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3f5ebae4f0.js" crossorigin="anonymous"></script>

    {{-- Include core + vendor Styles --}}
    @yield('vendorStyles')
    @yield('pageStyles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body data-asset-path="{{ asset('/')}}">
    @yield('content')


    @include("imports/scripts")
    @yield('vendorScripts')
    @yield('pageScripts')
</body>

