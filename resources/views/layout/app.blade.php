<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Klink | @yield('title')</title>
    @include('layout.styles-template.css-styles')
</head>

<body class="mini-sidebar">
    <div id="global-loader" style="display: none;">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        @include('sweetalert::alert')
        @include('layout.layouting.header')
        @include('layout.layouting.sidebar')
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
</body>
@include('layout.styles-template.js-styles')

</html>
