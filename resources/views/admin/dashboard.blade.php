@extends('layouts.app')

@section('title', 'Admin Dashboard')

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

        <a href="{{ route('admin.pictures.index') }}" class="admin-card">
            <h3>Pictures</h3>
        </a>

        <a href="#" class="admin-card">
            <h3>Users</h3>
        </a>

        <a href="#" class="admin-card">
            <h3>Categories</h3>
        </a>

        <a href="#" class="admin-card">
            <h3>Favorites</h3>
        </a>

    </div>

</div>