<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\User;

class ProductController extends Controller
{
    public function index(){
        $pictures = Picture::all();
        return view('admin.products.index', compact('pictures'));
    }
    public function create(){
        return view('admin.products.create');
    }
    public function store(Request $request){
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_url' => 'required|string',
        'artist' => 'required|string|max:255',
        'year' => 'required|integer',
        'category' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'technique' => 'nullable|string|max:255',
        'dimensions' => 'nullable|string|max:255',
        ]);

        Picture::create($request->all());

        return redirect()
        ->route('admin.product.index')
        ->with('success', 'Product created successfully');
    }

    public function show(Picture $picture){

        return view('admin.product.show', compact('picture'));
    }

    public function edit(Picture $picture){
        return view('admin.product.edit', compact('picture'));
    }

    public function update(Request $request, Picture $picture){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'required|string',
            'artist' => 'required|string|max:255',
            'year' => 'required|integer',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'technique' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
        ]);

        $picture->update($request->all());

        return redirect()
        ->route('admin.product.index')
        ->with('success', 'Продукт был добавлен');
    }
    public function dashboard(){
        $usersCount = User::count();
        return view('admin.dashboard', compact('usersCount'));

    }
}
