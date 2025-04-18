<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    @vite(['resources/css/register.css'])
    <link rel="shortcut icon" href="/photos/icon_dtm.webp" />
    <!-- Agregar Bootstrap para mejor estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        
            
        <a class="boto" href="{{ route('registrarse') }}">
            @csrf
            <input class="boto_header" type="submit" value="REGISTRARSE">
        </a>
        <a class="boto" href="{{ route('index') }}">
            @csrf
            <input class="boto_header" type="submit" value="HOME">
        </a>
            
    </div>
    <<div class="form-container">
        <div class="logincuadre">
            <h1 class="text-center mb-4">Registrarse</h1>
            
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('registrarse') }}" method="POST" enctype="multipart/form-data" id="registerForm">
                @csrf  
                    
                <div class="form-group mb-3">
                    <label for="photo" class="form-label">Foto de perfil:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="photo" name="photo" 
                               accept="image/jpeg, image/png, image/jpg, image/gif" required>
                        <label class="custom-file-label" for="photo" id="photoLabel">Seleccionar archivo...</label>
                    </div>
                    
                    @error('photo')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="nom" placeholder="Nombre" value="{{ old('nom') }}" 
                               class="form-control @error('nom') is-invalid @enderror" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <input type="text" name="cognom" placeholder="Apellido" value="{{ old('cognom') }}" 
                               class="form-control @error('cognom') is-invalid @enderror" required>
                        @error('cognom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <input type="text" name="nickname" placeholder="Nickname" value="{{ old('nickname') }}" 
                           class="form-control @error('nickname') is-invalid @enderror" required>
                    @error('nickname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <input type="text" name="dni" placeholder="DNI" value="{{ old('dni') }}" 
                           class="form-control @error('dni') is-invalid @enderror" required>
                    @error('dni')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" 
                           class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <input type="password" name="contrasenya" placeholder="Contraseña" 
                           class="form-control @error('contrasenya') is-invalid @enderror" required minlength="8">
                    @error('contrasenya')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <input type="password" name="contrasenya_confirmation" placeholder="Repetir Contraseña" 
                           class="form-control" required minlength="8">
                </div>
                
                <button type="submit" class="btn btn-primary w-100 mt-3 py-2">
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    Registrar
                </button>
            </form>
        </div>
    </div>
    

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>