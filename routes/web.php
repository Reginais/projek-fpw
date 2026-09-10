<?php 

//Codingan Tugas Pertemuan 2 Soal No.2
Route::get('/about', function () {
    return 'Selamat datang di Pos Barokah Mart! Kami menyediakan berbagai kebutuhan 
            sehari-hari dengan harga terjangkau dan pelayanan yang ramah.';
});

//Codingan Tugas Pertemuan 2 Soal No.3
Route::get('/dashboard', function () {
    return 'Selamat datang di Dashboard Admin Pos Barokah Mart!';
});
Route::post('/customers', function () {
    return 'Data pelanggan Pos Barokah Mart!';
});

use App\Http\Controllers\Auth\LoginController;
 
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');
 
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class,
'sales'])->name('report.sales');
    //Tugas Pertemuan 4 Soal No.1
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});