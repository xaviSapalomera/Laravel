<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    @vite(['resources/css/login.css'])
    @vite(['resources/css/estil_sesion.css'])
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <br>
    <div class="login-container">
        <h1>Iniciar sesió</h1>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Contrasenya</label>
            <input type="password" name="password" id="password" required>

            <div class="remember-me-container">
                <input type="checkbox" name="remember" id="remember" class="remember-checkbox">
                <label for="remember" class="remember-label">Recordarme</label>
            </div>
            
            @if(session('intents_fallits', 0) >= 3)
        <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
            @endif

            <button type="submit" class="submit-btn">Iniciar sesió</button>
        </form>
        <a href="{{ url('login/google') }}">Login with Google</a>
        
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
