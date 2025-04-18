<!-- resources/views/article/qr.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar QR</title>
</head>
<body>
    <h1>QR Code para el artículo: {{ $article->title }}</h1>

    <div>
        <!-- Muestra el código QR generado -->
        {!! $qrCode !!}
    </div>
</body>
</html>