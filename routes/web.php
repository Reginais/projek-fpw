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