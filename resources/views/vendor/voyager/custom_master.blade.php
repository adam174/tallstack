<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title> Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">



    <!-- App CSS -->

    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}"></script>



</head>

<body>


    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('admin.partials.sidebar')

            <div class="flex flex-col flex-1 overflow-hidden">
                @include('admin.partials.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        @yield('body')
                         @yield('content')
                    </div>
                </main>
            </div>
        </div>



<!-- Javascript Libs -->


@yield('javascript')


</body>
</html>
