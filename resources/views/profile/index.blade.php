@extends('layouts.app')

@section('title', 'Мой профиль - Избранные картины')

@section('content')
    <header class="profile-header">
        <h1>Мои избранные картины</h1>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="nav-link">На главную</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link">Выход</button>
            </form>
        </div>
    </header>

    @if(session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    @if($favorites->count() > 0)
        <div class="gallery">
            @foreach($favorites as $picture)
                <div class="card">
                    <img src="{{ $picture->image_url }}" alt="{{ $picture->title }}"
                         onerror="this.src='https://via.placeholder.com/400x300/000000/ffffff?text={{ urlencode($picture->title) }}'">
                    <div class="card-info">
                        <h3 class="card-title">{{ $picture->title }}</h3>
                        <div class="card-artist">{{ $picture->artist }}</div>
                        <a href="{{ route('pictures.show', $picture) }}" class="btn btn-full">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty">
            <h2>У вас пока нет избранных картин</h2>
            <p class="empty-actions">
                <a href="{{ route('home') }}" class="btn btn-inline">Перейти к галерее</a>
            </p>
        </div>
    @endif
@endsection

