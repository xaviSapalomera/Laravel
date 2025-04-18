<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->titol }}</title>
</head>
<body>
    <h1>{{ $article->titol }}</h1>
    <p>{{ $article->cos }}</p>

    <!-- Un enlace para regresar a la página principal -->
    <a href="{{ route('indexsession') }}">Volver a la página principal</a>
</body>
</html>