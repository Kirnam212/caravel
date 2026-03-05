@extends('layouts.app')

@section('title', 'Админка — картины')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>Картины (админка)</h1>
    </div>

    <div class="admin-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">← В дашборд</a>
        <a href="{{ route('admin.product.create') }}" class="btn" style="margin-left: 10px;">Добавить картину</a>
    </div>

    @if (session('success'))
        <div class="admin-success">
            {{ session('success') }}
        </div>
    @endif

    @if($pictures->isEmpty())
        <p>Пока нет ни одной картины.</p>
    @else
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Художник</th>
                <th>Год</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pictures as $picture)
                <tr>
                    <td>{{ $picture->id }}</td>
                    <td>{{ $picture->title }}</td>
                    <td>{{ $picture->artist }}</td>
                    <td>{{ $picture->year }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <a href="{{ route('admin.product.show', $picture) }}" class="btn-edit">Открыть</a>
                            <a href="{{ route('admin.product.edit', $picture) }}" class="btn-edit">Редактировать</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

