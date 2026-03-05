<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\RedirectResponse;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with(['user', 'picture'])
            ->orderByDesc('created_at')
            ->get();

        return view('admin.favorites.index', compact('favorites'));
    }

    public function destroy(Favorite $favorite): RedirectResponse
    {
        $favorite->delete();

        return back()->with('success', 'Избранное удалено.');
    }
}

