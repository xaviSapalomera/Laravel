<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/estil_sesion.css'])
    @vite(['resources/js/dropdown.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       
    </style>
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
            <a href="{{route('mostrar.perfil')}}">Perfil</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Tanca Sessió
              </a>
          </div>
        </div>
        <a class="boto" href="{{ route('articles.pantallacrear') }}">
            @csrf
            <input class="boto_header" type="submit" value="CREAR ARTICLE">
        </a>
        <a class="boto" href="{{ route('noticies.index') }}">
            @csrf
            <input class="boto_header" type="submit" value="NOTICIES EXTERNES">
        </a>
    </div>

    <div class="contenidor">
        <h1>Articles</h1>

        <form method="GET" action="{{ route('indexsession') }}">
            <label for="order">Filtre:</label>
            <select name="order">
                <option value="normal" {{ isset($order) && $order === 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="ascID" {{ isset($order) && $order === 'ascID' ? 'selected' : '' }}>Asc(ID)</option>
                <option value="descID" {{ isset($order) && $order === 'descID' ? 'selected' : '' }}>Desc(ID)</option>
                <option value="ascNom" {{ isset($order) && $order === 'ascNom' ? 'selected' : '' }}>Asc(Nom)</option>
                <option value="descNom" {{ isset($order) && $order === 'descNom' ? 'selected' : '' }}>Desc(Nom)</option>
            </select>
            <button type="submit">Ordenar</button>
        </form>

        <section class="articles">
            @forelse ($articles as $article)
                <div class="article-block">
                    <div class="article-header">
                        <h3>
                            <a href="{{ route('articles.mostrar', $article['id']) }}">
                                {{ $article['titol'] ?? 'Sense Titol' }}
                            </a>
                        </h3>
                        <small>Usuari: {{ $article['user_id'] ? \App\Models\ArticleModel::mostrarUsuariArticle($article['user_id']) : 'Sense Usuari' }}</small><br>
                    </div>
                    @if($article['image_path'])
                    <div class="article-image">
                        <img src="{{ asset('storage/' . $article['image_path']) }}" alt="Imatge de l'article" style="max-width: 100%; height: auto;">
                    </div>
                    @endif
                    <div class="article-content">
                        <p>{{ $article['cos'] ?? 'Sense Cos' }}</p>
                    </div>

                    @if (Auth::check() && Auth::user()->id == $article['user_id'] || Auth::user()->admin == 1)
                        <div class="article-actions">
                            <form method="GET" action="{{ route('articles.edit', $article['id']) }}" style="display: inline;">
                                @csrf
                                <button class="boto_editar" type="submit" aria-label="Editar article"></button>
                            </form>

                            <form action="{{ route('articles.borrar', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')  
                                <button type="submit" class="boto_borrar" onclick="return confirm('¿Estás seguro de eliminar este artículo?');">
                                </button>
                            </form>


                        </div>
                    @endif
                    <button type="button" class="btn-qr" onclick="abrirPopup({{ $article->id }})">
                        <i class="fas fa-qrcode"></i> Generar QR
                    </button>
                </div>
            @empty
                <p>No hi han articles </p>
            @endforelse
        </section>

        <!-- Paginación -->
        <section class="paginacio">
            <ul>
                @if (isset($paginaActual) && isset($totalPagines))
                    <ul>
                        @if ($paginaActual > 1)
                            <li><a href="?page={{ $paginaActual - 1 }}">&laquo; Anterior</a></li>
                        @else
                            <li class="disabled"><a href="#">&laquo; Anterior</a></li>
                        @endif

                        @for ($i = 1; $i <= $totalPagines; $i++)
                            @if ($paginaActual == $i)
                                <li class="active"><a href="#">{{ $i }}</a></li>
                            @else
                                <li><a href="?page={{ $i }}">{{ $i }}</a></li>
                            @endif
                        @endfor

                        @if ($paginaActual < $totalPagines)
                            <li><a href="?page={{ $paginaActual + 1 }}">Seguent &raquo;</a></li>
                        @else
                            <li class="disabled"><a href="#">Seguent &raquo;</a></li>
                        @endif
                    </ul>
                @endif
            </ul>
        </section>
    </div>

    
    <div id="qrPopup" class="qr-popup">
        <div class="qr-popup-content">
            <h3>Escaneja el QR per accedir a l'article</h3>
            <div id="qrCodeContainer"></div>
            <button class="close-btn" onclick="tancarPopup()">Tancar</button>
        </div>
    </div>

    <script>
        // Funcio per obrir el Pop up
        function abrirPopup(articleId) {
            // Mostrar mensaje de carga
            
            document.getElementById('qrPopup').style.display = 'flex';
            
           
            fetch(`/articles/${articleId}/qr`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.text();
                })
                .then(qrCode => {
                    document.getElementById('qrCodeContainer').innerHTML = qrCode;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('qrCodeContainer').innerHTML = '<p>Error al generar el código QR</p>';
                });
        }

        // Funcio tancar Pop up
        function tancarPopup() {
            document.getElementById('qrPopup').style.display = 'none';
        }
    </script>
</body>
</html>