<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous" defer>
    </script>
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <script src="{{ URL::asset('/js/app.js') }}" defer></script>
    @yield ('title')
    @yield ('head')
</head>

<body class="bg-light-subtle">
    <x-navigation></x-navigation>

    @yield ('content')

    <x-footer></x-footer>

    @include ('flash::message')

    <script>
        window.setTimeout(() => {
            document.getElementById('snackbar').classList.add('fadeout');
        }, 3000);
    </script>

</body>

</html>
