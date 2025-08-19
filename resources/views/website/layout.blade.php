<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyWebsite')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { font-family: 'Arial', sans-serif; }
        .bg-gradient { transition: background 0.3s; }
        .bg-gradient:hover { background: linear-gradient(to right, #1e90ff, #24cdcd); }
    </style>
</head>
<body>
    @include('website.include.header')

    <main class="py-5">
        @yield('content')
    </main>

    @include('website.include.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
