@extends('layouts.app')

@section('title', 'Редактировать картину — админка')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>Редактировать картину</h1>
    </div>

    <a href="{{ route('admin.product.index') }}" class="btn-back">← Назад к списку</a>

    @if ($errors->any())
        <div class="admin-success" style="margin-top: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.product.update', $picture) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <div class="admin-form-group">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" value="{{ old('title', $picture->title) }}" required>
        </div>

        <div class="admin-form-group">
            <label for="artist">Художник</label>
            <input type="text" id="artist" name="artist" value="{{ old('artist', $picture->artist) }}" required>
        </div>

        <div class="admin-form-group">
            <label for="year">Год</label>
            <input type="number" id="year" name="year" value="{{ old('year', $picture->year) }}" required>
        </div>

        <div class="admin-form-group">
            <label for="category">Категория</label>
            <input type="text" id="category" name="category" value="{{ old('category', $picture->category) }}" required>
        </div>

        <div class="admin-form-group">
            <label for="price">Цена</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $picture->price) }}" required>
        </div>

        <div class="admin-form-group">
            <label for="image_url">Ссылка на изображение</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $picture->image_url) }}" required>
        </div>

        <div class="admin-form-group">
            <label for="technique">Техника (необязательно)</label>
            <input type="text" id="technique" name="technique" value="{{ old('technique', $picture->technique) }}">
        </div>

        <div class="admin-form-group">
            <label for="dimensions">Размеры (необязательно)</label>
            <input type="text" id="dimensions" name="dimensions" value="{{ old('dimensions', $picture->dimensions) }}">
        </div>

        <div class="admin-form-group">
            <label for="description">Описание (необязательно)</label>
            <textarea id="description" name="description">{{ old('description', $picture->description) }}</textarea>
        </div>

        <button type="submit" class="btn">Сохранить</button>
    </form>
@endsection

