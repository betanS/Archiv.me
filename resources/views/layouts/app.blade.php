<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>archiv.me</title>
    <link rel="stylesheet" href="{{ asset('styles/styleProfile.css') }}">
    @yield('head') {{-- opcional para css extra --}}
</head>
<body>
    @yield('content')

    @yield('scripts') {{-- scripts específicos por página --}}
</body>
</html>
