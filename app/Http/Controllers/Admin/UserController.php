<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->get();

        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user): RedirectResponse
    {
        $user->is_admin = ! $user->is_admin;
        $user->save();

        return back()->with('success', 'Статус администратора обновлён.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('success', 'Пользователь удалён.');
    }
}

