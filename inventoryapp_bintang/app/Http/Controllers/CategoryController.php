<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi input (termasuk description)
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string', // 'nullable' berarti boleh kosong
        ]);

        // 2. Simpan data (termasuk description)
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/category')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', ['category' => $category]);
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, string $id)
    {
        // 1. Validasi input (termasuk description)
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);

        // 2. Update data (termasuk description)
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/category')->with('success', 'Data kategori berhasil diubah!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/category')->with('success', 'Data kategori berhasil dihapus!');
    }
}