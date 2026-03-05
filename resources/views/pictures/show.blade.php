@extends('layouts.app')

@section('title', $picture->title.' - Галерея картин')
@section('containerClass', 'container--narrow')

@section('content')
    <nav class="nav">
        <a href="{{ route('home') }}" class="btn-back">← Назад к галерее</a>
        <div class="nav-links">
            @include('partials.nav-auth-links')
        </div>
    </nav>

    <div class="picture-detail">
        <div class="picture-image-container">
            <img src="{{ $picture->image_url }}"
                 alt="{{ $picture->title }}"
                 class="picture-image"
                 onerror="this.src='https://via.placeholder.com/600x800/000000/ffffff?text={{ urlencode($picture->title) }}'">
        </div>
        <div class="picture-info">
            <h1 class="picture-title">{{ $picture->title }}</h1>
            <div class="picture-artist">{{ $picture->artist }}</div>

            <div class="picture-meta">
                @if($picture->year)
                    <div class="meta-item">
                        <strong>Год создания:</strong> {{ $picture->year }}
                    </div>
                @endif
                @if($picture->category)
                    <div class="meta-item">
                        <strong>Категория:</strong>
                        <span class="category-badge">{{ $picture->category }}</span>
                    </div>
                @endif
            </div>

            @if($picture->description)
                <div class="picture-description">
                    <strong>Описание:</strong><br>
                    {{ $picture->description }}
                </div>
            @endif

            @auth
                @if($isFavorite)
                    <form action="{{ route('favorites.destroy', $picture) }}" method="POST" class="favorite-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="favorite-btn favorited">Удалить из избранного</button>
                    </form>
                @else
                    <form action="{{ route('favorites.store', $picture) }}" method="POST" class="favorite-form">
                        @csrf
                        <button type="submit" class="favorite-btn">Добавить в избранное</button>
                    </form>
                @endif
            @else
                <div class="login-hint">
                    <a href="{{ route('login') }}" class="login-hint-link">Войдите</a>, чтобы добавить картину в избранное
                </div>
            @endauth
        </div>
    </div>
@endsection
