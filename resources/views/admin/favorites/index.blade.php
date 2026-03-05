@extends('layouts.app')

@section('title', 'Админка — избранное')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>Избранные картины</h1>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn-back">← В дашборд</a>

    @if (session('success'))
        <div class="admin-success" style="margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if($favorites->isEmpty())
        <p style="margin-top: 20px;">Избранных записей пока нет.</p>
    @else
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Картина</th>
                <th>Создано</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($favorites as $favorite)
                <tr>
                    <td>{{ $favorite->id }}</td>
                    <td>{{ $favorite->user?->email }}</td>
                    <td>{{ $favorite->picture?->title }}</td>
                    <td>{{ $favorite->created_at?->format('d.m.Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.favorites.destroy', $favorite) }}" method="POST"
                              class="admin-actions-inline"
                              onsubmit="return confirm('Удалить это избранное?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

