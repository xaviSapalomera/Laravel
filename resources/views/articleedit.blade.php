<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    @vite(['resources/css/insert.css'])
    <title>{{ $article->titol }}</title>
    <style>
        .image-preview {
            max-width: 200px;
            margin-top: 10px;
            display: block;
        }
        .current-image {
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <a class="boto" href="{{ route('indexsession') }}">
            @csrf
            <input class="boto_header" type="submit" value="HOME">
        </a>
    <form class="form" action="{{ route('articles.actualitzar', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input class="input" type="text" id="titol" name="titol" value="{{ old('titol', $article->titol) }}" placeholder="Títol" required>
        <br><br>

        <textarea class="input" id="cos" name="cos" placeholder="Cos" style="height: 250px; width: 400px; text-align: left; padding: 10px;" required>{{ old('cos', $article->cos) }}</textarea>
        <br><br>

        <div class="form-group">
            <label for="image">Imatge de l'article (opcional)</label>
            <input type="file" class="input" id="image" name="image" accept="image/*">
            
            
            @if($article->image_path)
                <p>Imatge actual:</p>
                <img class="current-image" src="{{ asset('images/' . $article->image_path) }}" alt="Imatge actual">
            @else
                <p>No hi ha imatge pujada</p>
            @endif
            
            
            <img id="imagePreview" src="#" alt="Vista prèvia" class="image-preview" style="display:none;">
        </div>

        <input style="margin-left: 150px; font-size: 40px;" type="submit" value="Guardar Canvis">
    </form>

</body>
</html>