<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyWebsite')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
     <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- jQuery AJAX (already included in jQuery, but you can add migrate if needed) -->
    <script src="https://code.jquery.com/jquery-migrate-3.4.1.min.js"></script>
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


    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
