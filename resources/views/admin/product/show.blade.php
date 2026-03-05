@extends('layouts.app')

@section('title', $picture->title . ' — админка')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>{{ $picture->title }}</h1>
    </div>

    <a href="{{ route('admin.product.index') }}" class="btn-back">← Назад к списку</a>

    <div class="admin-show">
        <h2>Информация о картине</h2>

        <p><strong>Художник:</strong> {{ $picture->artist }}</p>
        @if($picture->year)
            <p><strong>Год:</strong> {{ $picture->year }}</p>
        @endif
        @if($picture->category)
            <p><strong>Категория:</strong> {{ $picture->category }}</p>
        @endif
        @if($picture->price)
            <p><strong>Цена:</strong> {{ $picture->price }}</p>
        @endif
        @if($picture->technique)
            <p><strong>Техника:</strong> {{ $picture->technique }}</p>
        @endif
        @if($picture->dimensions)
            <p><strong>Размеры:</strong> {{ $picture->dimensions }}</p>
        @endif

        @if($picture->description)
            <div class="admin-meta" style="margin-top: 20px;">
                <strong>Описание:</strong><br>
                {{ $picture->description }}
            </div>
        @endif
    </div>
@endsection

