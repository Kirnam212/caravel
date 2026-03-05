@extends('layouts.app')

@section('title', 'Админка — категории')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-header">
        <h1>Категории картин</h1>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn-back">← В дашборд</a>

    @if($categories->isEmpty())
        <p style="margin-top: 20px;">Категорий пока нет.</p>
    @else
        <table class="admin-table">
            <thead>
            <tr>
                <th>Категория</th>
                <th>Кол-во картин</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->pictures_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

