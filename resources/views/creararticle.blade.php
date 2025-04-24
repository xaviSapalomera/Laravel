<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Articles</title>
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
    @vite(['resources/css/pop_up.css'])
    @vite(['resources/css/estil_sesion.css'])
    @vite(['resources/css/insert.css'])
    @vite(['resources/js/articles_control.js'])
    @vite(['resources/js/articles.js'])
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <a class="boto" href="{{ route('indexsession') }}">
    @csrf
        <input type="submit" value="Home">
</a>
    <hr style="width: 100%; margin: 0;">
    
    
    <form id="articleForm" class="form" action="{{ route('crear.article') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titol">Títol</label>
            <input id="titol" class="input" type="text" name="titol" placeholder="Títol de l'article" required>
            <div id="titolDIV" class="error"></div>
        </div>
        
        <div class="form-group">
            <label for="cos">Contingut</label>
            <textarea id="cos" class="input" name="cos" placeholder="Contingut de l'article..." required></textarea>
            <div id="cosDIV" class="error"></div>
        </div>
        
        <div class="form-group">
            <label for="image">Imatge de l'article (opcional)</label>
            <input type="file" class="input" id="image" name="image" accept="image/*">
            <small>Formatos aceptats: JPEG, PNG, JPG, GIF. Màxim 2MB.</small>
            <div id="imagePreview" class="mt-2">
                <img id="previewImage" src="#" alt="Vista prèvia" style="display: none;">
            </div>
        </div>

        <input id="insertArticleBtn" type="submit" value="Crear Article">
    </form>
    
    <table id="articlesTable">
        <thead>
            <tr>
                
                <th>Títol</th>
                <th>Cos</th>
                <th>Usuari</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</body>
</html>