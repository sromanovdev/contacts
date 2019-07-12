<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            padding-top: 5rem;
        }
        .main {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">CSV Field Import Mapper</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ route('contacts.index') === url()->current() ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contacts.index') }}">Contacts<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ route('contacts.create') === url()->current() ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contacts.create') }}">Upload</a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="main">
            <div id="app">
                @yield('content')
            </div>
        </div>
    </main><!-- /.container -->

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('javascript')

</div>
</body>
</html>
