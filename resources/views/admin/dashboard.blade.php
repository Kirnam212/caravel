@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<div class="container">

    <div class="admin-header">
        <h1>Admin Panel</h1>
    </div>

  
    <div class="admin-stats">

        <div class="stats-circle">
            {{ $usersCount }}
        </div>

        <p class="stats-text">
            зарегистрировано пользователей
        </p>

    </div>

   
    <div class="admin-grid">

        <a href="{{ route('admin.product.index') }}" class="admin-card">
            <h3>Картины</h3>
        </a>

        <a href="{{ route('admin.users.index') }}" class="admin-card">
            <h3>Пользователи</h3>
        </a>

        <a href="{{ route('admin.categories.index') }}" class="admin-card">
            <h3>Категории</h3>
        </a>

        <a href="{{ route('admin.favorites.index') }}" class="admin-card">
            <h3>Фавориты</h3>
        </a>

    </div>

</div>