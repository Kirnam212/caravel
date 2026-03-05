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

    <!-- СТАТИСТИКА -->
    <div class="admin-stats">

        <div class="stats-circle">
            {{ $usersCount }}
        </div>

        <p class="stats-text">
            зарегистрировано пользователей
        </p>

    </div>

    <!-- CRUD БЛОКИ -->
    <div class="admin-grid">

        <a href="{{ route('admin.product.index') }}" class="admin-card">
            <h3>Pictures</h3>
        </a>

        <a href="{{ route('admin.users.index') }}" class="admin-card">
            <h3>Users</h3>
        </a>

        <a href="{{ route('admin.categories.index') }}" class="admin-card">
            <h3>Categories</h3>
        </a>

        <a href="{{ route('admin.favorites.index') }}" class="admin-card">
            <h3>Favorites</h3>
        </a>

    </div>

</div>