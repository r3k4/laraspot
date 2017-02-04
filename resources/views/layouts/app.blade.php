<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{!! mix('/css/app.css') !!}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
    @include('layouts.komponen.nav_atas')
    @include('layouts.komponen.modal')

    @include('layouts.komponen.pesan')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{!! mix('/js/app.js') !!}"></script>
    @yield('custom_script')
</body>
</html>
