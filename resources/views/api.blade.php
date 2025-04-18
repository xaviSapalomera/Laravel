@vite(['resources/css/estil_sesion.css'])

<div class="header">
    <a class="boto" href="{{ route('indexsession') }}">
        @csrf
        <input class="boto_header" type="submit" value="HOME">
    </a>
</div>

<h2 style="margin-top: 30px;">NOTICIES EXTERNES</h2>
<div class="articles-container">
    @forelse ($api_articles as $article)
    <div class="article-block api-article">
        
        <div class="article-header">
            <h3>
                <a href="{{ $article['url'] }}" target="_blank" rel="noopener noreferrer">
                    {{ $article['title'] ?? 'Sense títol' }}
                </a>
            </h3>
            <div class="api-source">Font: {{ $article['source']['name'] ?? 'Sense Font' }}</div>
            <div class="api-date">Publicat: {{ \Carbon\Carbon::parse($article['publishedAt'])->diffForHumans() }}</div>
        </div>
        
        @if(!empty($article['urlToImage']))
        <div class="article-image">
            <img src="{{ $article['urlToImage'] }}" 
                 alt="{{ $article['title'] ?? 'Sense Foto' }}" 
                 style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
        </div>
        @endif
        
        <div class="article-content">
            <p style="height: 60px; overflow: hidden; text-overflow: ellipsis;">
                {{ $article['description'] ?? 'Sense Descripcio' }}
            </p>
        </div>
        
    </div>
    @empty
    <div style="width: 100%; padding: 20px; text-align: center;">
        No hi han noticies
    </div>
    @endforelse
</div>