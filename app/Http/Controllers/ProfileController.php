<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $user = request()->user();

        $favorites = $user
            ->favoritePictures()
            ->orderByPivot('created_at', 'desc')
            ->get();
        
        return view('profile.index', compact('favorites'));
    }
}
