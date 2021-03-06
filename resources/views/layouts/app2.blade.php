<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Comment board">
    <meta name="keywords" content="laravel,breeze,board">
    <meta name="author" content="Masakazu Kobayashi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation2')

        <!-- Page Heading -->
        <!-- <header class="bg-white shadow">

                <ul class="flex items-center">
                    <li>
                        <a href="" class="p-10">Home</a>
                    </li>
                    <li>
                        <a href="{{route('index.comment')}}" class="p-3">Commnets</a>
                    </li>
                    <li>
                        <a href="" class="p-3">User</a>
                    </li>
                </ul>
            </nav>
        </header> -->

        <!-- Page Content -->
        @yield('content')
    </div>

</body>

</html>