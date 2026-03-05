@extends('layouts.app')

@section('title', 'Блог о картинах')

@section('content')
    <nav class="nav nav--bordered">
        <div>
            <a href="{{ route('home') }}" class="brand-link">Блог о картинах</a>
        </div>
        <div class="nav-links">
            @include('partials.nav-auth-links')
        </div>
    </nav>

    <header class="home-header">
        <h1>Блог о картинах</h1>
        <p class="subtitle">Исследуем мир искусства и живописи</p>
    </header>

    @if($featuredPicture)
        <section class="featured-section">
            <div class="featured-picture">
                <img src="{{ $featuredPicture->image_url }}"
                     alt="{{ $featuredPicture->title }}"
                     class="featured-image"
                     onerror="this.src='https://via.placeholder.com/600x800/000000/ffffff?text={{ urlencode($featuredPicture->title) }}'">
                <div class="featured-content">
                    <h2>{{ $featuredPicture->title }}</h2>
                    <div class="artist">{{ $featuredPicture->artist }}</div>
                    @if($featuredPicture->description)
                        <div class="description">{{ $featuredPicture->description }}</div>
                    @endif
                    <div class="featured-meta">
                        @if($featuredPicture->year)
                            <span>Год: {{ $featuredPicture->year }}</span>
                        @endif
                        @if($featuredPicture->category)
                            <span>Категория: {{ $featuredPicture->category }}</span>
                        @endif
                    </div>
                    <a href="{{ route('pictures.show', $featuredPicture) }}" class="btn">Подробнее</a>
                </div>
            </div>
        </section>
    @endif

    <section class="facts-section">
        <h2 class="section-title">Интересные факты</h2>
        <div class="facts-grid">
            @foreach($interestingPictures as $picture)
                <div class="fact-card">
                    <img src="{{ $picture->image_url }}"
                         alt="{{ $picture->title }}"
                         class="fact-image"
                         onerror="this.src='https://via.placeholder.com/400x300/000000/ffffff?text={{ urlencode($picture->title) }}'">
                    <h3>{{ $picture->title }}</h3>
                    <div class="fact-artist">{{ $picture->artist }}</div>
                    @if($picture->description)
                        <div class="fact-text">{{ \Illuminate\Support\Str::limit($picture->description, 150) }}</div>
                    @endif
                    @if($picture->year)
                        <div class="fact-text fact-year">
                            Год создания: {{ $picture->year }}
                        </div>
                    @endif
                    <a href="{{ route('pictures.show', $picture) }}" class="btn fact-btn">
                        Читать далее
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="famous-section">
        <h2 class="section-title">Известные картины</h2>
        <div class="famous-gallery">
            @foreach($famousPictures as $picture)
                <div class="famous-card" onclick="window.location='{{ route('pictures.show', $picture) }}'">
                    <img src="{{ $picture->image_url }}"
                         alt="{{ $picture->title }}"
                         class="famous-image"
                         onerror="this.src='https://via.placeholder.com/400x300/000000/ffffff?text={{ urlencode($picture->title) }}'">
                    <div class="famous-info">
                        <h3>{{ $picture->title }}</h3>
                        <div class="famous-artist">{{ $picture->artist }}</div>
                        <div class="famous-meta">
                            @if($picture->year)
                                <span>{{ $picture->year }}</span>
                            @endif
                            @if($picture->category)
                                <span>{{ $picture->category }}</span>
                            @endif
                        </div>
                        <a href="{{ route('pictures.show', $picture) }}" class="btn">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="site-footer">
        <p>© 2024 Блог о картинах. Все права защищены.</p>
        <p class="footer-subtitle">
            Исследуйте мир искусства, открывайте для себя новые произведения и сохраняйте любимые картины в избранное.
        </p>
    </footer>
@endsection
