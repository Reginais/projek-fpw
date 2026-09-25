use App\Http\Controllers\PostController;

// Proteksi route dengan middleware auth Sanctum (opsional)
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class); //[cite: 3]
});