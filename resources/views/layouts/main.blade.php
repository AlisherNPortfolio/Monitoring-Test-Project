<!DOCTYPE html>
<html lang="en">
@stack('scripts')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzcard Statistic</title>
    @stack('styles')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;500&display=swap" rel="stylesheet">
    @stack('head_scripts')
</head>

<body>
    @yield('content')

    @stack('end_scripts')
</body>

</html>
