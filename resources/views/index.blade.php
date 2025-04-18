<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Articles</title>
    <!-- Vite handled assets -->
    @vite(['resources/css/estil.css'])
    @vite(['resources/js/dropdown.js'])

    <!-- Bootstrap CDN (optional if you are using Vite for CSS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('photos/icon_dtm.webp') }}"/>
</head>
<body>


<div class="header">
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
      </svg>
    </button>
    <div id="myDropdown" class="dropdown-content">
      <a href="{{route('login')}}">Inicia Sesió</a>
      <a href="{{route('registrarse')}}">Registrarse</a>
    </div>
  </div>
</div>

<br>



<!-- Optional: Add Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
