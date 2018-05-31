<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('styles')
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <title>@section('title') @lang('messages.company_name') @show</title>
</head>
<body>
<div class="page">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</div>
@section('scripts')
    <script src="/js/script.js"></script>
@show
</body>
</html>
