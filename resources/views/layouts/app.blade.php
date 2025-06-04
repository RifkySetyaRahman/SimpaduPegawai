<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Sistem Pegawai</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
