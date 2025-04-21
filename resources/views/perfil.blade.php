<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de {{ $usuari->nickname }}</title>
    @vite(['resources/css/profile.css'])
</head>
<body>

    
    @if(session('success'))
        <div class="alert alert-success" style="background-color: green; color: white; padding: 10px; margin: 10px 0;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" style="background-color: red; color: white; padding: 10px; margin: 10px 0;">
            {{ session('error') }}
        </div>
    @endif

    <div class="contenidor">


        <a href="{{ route('indexsession') }}" class="logout">Home</a>


        <div class="text-center mb-4">
            @if($usuari->photo && Storage::disk('public')->exists($usuari->photo))
                <img src="{{ asset('storage/' . $usuari->photo) }}" alt="Foto de perfil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            @else
                <img src="{{ asset('storage/photos_profile/default-profile.jpg') }}" alt="Foto por defecto" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            @endif
        </div>


        <form method="POST" action="{{ route('actualitzar.fotoperfil', ['id' => $usuari->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="photo">Selecciona nova foto:</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            
            <button type="submit" class="btn btn-primary">Actualitzar Foto</button>
        </form>

        <h1>Perfil de {{ $usuari->nickname }}</h1>

       
        <form action="{{ route('perfil.nickname') }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <input name="nickname" type="text" value="{{ $usuari->nickname }}" class="input" required>
            <input type="submit" value="Actualizar Nickname" class="button">
        </form>
    </div>

    <div>
        <!-- Formulario para actualizar contraseña -->
        <form class="form" action="{{ route('perfil.actualitzarcontrasenya') }}" method="POST">
            @csrf
            @method('PUT') <!-- Esta línea es crucial -->
            
            <input name="oldpassword" class="input" type="password" placeholder="Antiga Contrasenya" required>
            <br>
            <input name="newpassword" class="input" type="password" placeholder="Nova Contrasenya" required>
            <br>
            <input name="newpassword_confirmation" class="input" type="password" placeholder="Repeteix Nova Contrasenya" required>
            <br><br>
            <input type="submit" value="Canviar contrasenya">
        </form>

    </div>

</body>
</html>
