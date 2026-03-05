@extends('layouts.app')

@section('title', 'Админка — пользователи')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>Пользователи</h1>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn-back">← В дашборд</a>

    @if (session('success'))
        <div class="admin-success" style="margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if($users->isEmpty())
        <p style="margin-top: 20px;">Пользователей пока нет.</p>
    @else
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Админ</th>
                <th>Создан</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                    <td>{{ $user->created_at?->format('d.m.Y') }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <form action="{{ route('admin.users.toggle-admin', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-edit">
                                    {{ $user->is_admin ? 'Убрать админа' : 'Сделать админом' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                  onsubmit="return confirm('Точно удалить пользователя?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

