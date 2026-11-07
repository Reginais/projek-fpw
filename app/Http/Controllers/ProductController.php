<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
// Praktikum Pertemuan 7
use App\Http\Requests\StoreProductRequest;
// Praktikum Pertemuan 9
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Praktikum Pertemuan 8
        /* $products = Product::with('category')->latest()->paginate(10);
        return view('master-data.product.index', compact('products'));*/

        // Praktikum Pertemuan 10
        $query = Product::with('category');
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                ->orWhere('code', 'like', "%{$keyword}%");
            });
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Tugas Pertemuan 10 Soal No.1
        if ($request->stock_status === 'habis') {
            $query->where('stock', 0);
        } elseif ($request->stock_status === 'menipis') {
            $query->where('stock', '>', 0)->where('stock', '<=', 10);
        }

        // Tugas Pertemuan 10 Soal No.2
        $allowed = [10, 25, 50];
        $perPage = in_array((int) $request->per_page, $allowed) ? (int) $request->per_page : 10;
        
        $products = $query->latest()->paginate($perPage)->withQueryString();
        $categories = Category::orderBy('name')->get();
        return view('master-data.product.index', compact('products', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Praktikum Pertemuan 7
        $categories = Category::orderBy('name')->get();
        return view('master-data.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Praktikum Pertemuan 7
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Praktikum Pertemuan 9
        $categories = Category::orderBy('name')->get();
        return view('master-data.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Praktikum Pertemuan 9
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Praktikum Pertemuan 9
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}