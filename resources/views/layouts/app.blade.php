<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Biblioteca')</title>

    {{-- Bootstrap 5 CSS desde CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Iconos Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Barra de navegación --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('libros.index') }}">
                <i class="bi bi-book-half"></i> Biblioteca
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('libros.index') }}">
                    <i class="bi bi-list-ul"></i> Catálogo
                </a>
                <a class="nav-link" href="{{ route('libros.create') }}">
                    <i class="bi bi-plus-circle"></i> Nuevo Libro
                </a>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="container my-4">

        {{-- Alerta de éxito (si hay mensaje flash) --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Sección reemplazable por cada vista --}}
        @yield('contenido')
    </main>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>