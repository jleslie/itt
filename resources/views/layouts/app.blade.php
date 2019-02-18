<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if(isset($pageTitle))
            <title>{{ $pageTitle }}</title>
        @else
            <title>In Time Tec Take Home</title>
        @endif
        <link rel="shortcut icon" href="{{ asset('logo_80x80.png') }}" >
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
        @include('inc.banner')
        <div id="outer-wrap-main">
            <div id="inner-wrap-main">
                <div id="primary">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
    @include('inc.footer')
</html>