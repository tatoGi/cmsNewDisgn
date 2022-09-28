<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('admin.layouts.head')
</head>
<body>
    <div id="app">
       @include('admin.layouts.sidebar')
       
        <div id="main" class='layout-navbar'>
            @include('admin.layouts.header')
            
            @yield('content')

        </div>
    </div>

    @include('admin.layouts.scripts')
</body>
</html>
