<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Picture::select('category', DB::raw('count(*) as pictures_count'))
            ->whereNotNull('category')
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }
}

