<!DOCTYPE html>
<html lang="{{config('app-locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title></title>
</head>
<body class="bg-gray-50"">
    <div class="container mx-auto py-8">
        @yield('content')
    </div>
</body>
</html>