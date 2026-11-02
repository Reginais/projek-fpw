<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// Tugas Pertemuan 9 Soal No.1
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Praktikum Pertemuan 7
        $categories = Category::latest()->paginate(10);
        return view('master-data.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Praktikum Pertemuan 7
        return view('master-data.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Praktikum Pertemuan 7
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Tugas Pertemuan 9 Soal No.1
        $categories = Category::orderBy('name')->get();
        return view('master-data.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Tugas Pertemuan 9 Soal No.1
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Tugas Pertemuan 9 Soal No.2
        if ($category->products()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Kategori "' . $category->name . '" tidak dapat dihapus karena masih memiliki produk.');
        }

        // Tugas Pertemuan 9 Soal No.1
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}