@extends('layouts.auth')

@section('title', 'Вход')

@section('content')
    <div class="auth-container">
        <h1>Вход</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Войти</button>
        </form>
        <div class="links">
            <a href="{{ route('register') }}">Нет аккаунта? Зарегистрироваться</a>
        </div>
    </div>
@endsection

