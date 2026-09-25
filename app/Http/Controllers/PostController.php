<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;            // Import Request untuk method index
use App\Http\Requests\StorePostRequest; // Import Form Request
use App\Http\Resources\PostResource;   // Import API Resource

class PostController extends Controller
{
    // Mengambil daftar data (dengan Pagination & Search)
    public function index(Request $request)
    {
        $posts = Post::query()
            ->when($request->search, fn($q, $s) => $q->where('title', 'like', "%{$s}%"))
            ->latest()
            ->paginate(10);

        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated()); 

        return (new PostResource($post))
            ->response()
            ->setStatusCode(201); 
    }
}
