@extends('layouts.app')

@section('title', 'Добавить картину — админка')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>Добавить картину</h1>
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

    <form action="{{ route('admin.product.store') }}" method="POST" class="admin-form">
        @csrf

        <div class="admin-form-group">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="admin-form-group">
            <label for="artist">Художник</label>
            <input type="text" id="artist" name="artist" value="{{ old('artist') }}" required>
        </div>

        <div class="admin-form-group">
            <label for="year">Год</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}" required>
        </div>

        <div class="admin-form-group">
            <label for="category">Категория</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}" required>
        </div>

        <div class="admin-form-group">
            <label for="price">Цена</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="admin-form-group">
            <label for="image_url">Ссылка на изображение</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}" required>
        </div>

        <div class="admin-form-group">
            <label for="technique">Техника (необязательно)</label>
            <input type="text" id="technique" name="technique" value="{{ old('technique') }}">
        </div>

        <div class="admin-form-group">
            <label for="dimensions">Размеры (необязательно)</label>
            <input type="text" id="dimensions" name="dimensions" value="{{ old('dimensions') }}">
        </div>

        <div class="admin-form-group">
            <label for="description">Описание (необязательно)</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn">Создать</button>
    </form>
@endsection

