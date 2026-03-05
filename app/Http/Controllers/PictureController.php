<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Database\Eloquent\Collection;

class PictureController extends Controller
{
    public function index()
    {
        $featuredPicture = Picture::where('is_featured', true)
            ->latest()
            ->first();

        $famousPictures = Picture::withCount('favorites')
            ->orderByDesc('favorites_count')
            ->orderByDesc('views_count')
            ->limit(6)
            ->get();

        $interestingPictures = Picture::orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('pictures.index', [
            'featuredPicture' => $featuredPicture,
            'famousPictures' => $famousPictures,
            'interestingPictures' => $interestingPictures,
        ]);
    }

    public function show(Picture $picture)
    {
        $picture->increment('views_count');

        $user = request()->user();

        $isFavorite = $user
            ? $user->favorites()->where('picture_id', $picture->id)->exists()
            : false;
        
        return view('pictures.show', compact('picture', 'isFavorite'));
    }

    // Остальные методы оставляем без изменений
}
