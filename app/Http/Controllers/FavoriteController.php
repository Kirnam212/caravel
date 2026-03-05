<?php

namespace App\Http\Controllers;

use App\Models\Picture;

class FavoriteController extends Controller
{
    public function store(Picture $picture)
    {
        $user = request()->user();

        $user->favoritePictures()->syncWithoutDetaching([$picture->id]);
        
        return back()->with('success', 'Картина добавлена в избранное');
    }

    public function destroy(Picture $picture)
    {
        $user = request()->user();

        $user->favoritePictures()->detach($picture->id);
        
        return back()->with('success', 'Картина удалена из избранного');
    }
}
