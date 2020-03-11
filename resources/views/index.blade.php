<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>Lan Xang Digital</title>

    <!-- Styles -->
    <style>
        @font-face {
            font-family: "Noto Sans";
            font-weight: 300;
            src: url("{{ asset('fonts/NotoSans-Light.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans";
            font-weight: 400;
            src: url("{{ asset('fonts/NotoSans-Regular.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans";
            font-weight: 500;
            src: url("{{ asset('fonts/NotoSans-Medium.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans";
            font-weight: 600;
            src: url("{{ asset('fonts/NotoSans-SemiBold.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans";
            font-weight: 700;
            src: url("{{ asset('fonts/NotoSans-Bold.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans Lao";
            font-weight: 300;
            src: url("{{ asset('fonts/NotoSansLao-Light.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans Lao";
            font-weight: 400;
            src: url("{{ asset('fonts/NotoSansLao-Regular.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans Lao";
            font-weight: 500;
            src: url("{{ asset('fonts/NotoSansLao-Medium.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans Lao";
            font-weight: 600;
            src: url("{{ asset('fonts/NotoSansLao-SemiBold.woff2') }}");
        }

        @font-face {
            font-family: "Noto Sans Lao";
            font-weight: 700;
            src: url("{{ asset('fonts/NotoSansLao-Bold.woff2') }}");
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <div id="app">
        <header>
            <Navbarcomponent></Navbarcomponent>
        </header>
        <main class="container" style="min-height: 100vh">
            <router-view></router-view>
        </main>
        <Footercomponent></Footercomponent>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
