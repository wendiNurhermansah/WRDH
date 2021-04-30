<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware();

// admin
Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');
Route::get('admin/data_user', [AdminController::class, 'index'])
    ->name('admin.data_user')
    ->middleware('is_admin');
Route::get('admin/TambahData', [AdminController::class, 'tambahData'])
    ->name('admin.TambahData')
    ->middleware('is_admin');
Route::post('admin/submit', [AdminController::class, 'create'])
    ->name('admin.submit')
    ->middleware('is_admin');
Route::get('admin/delete/{id}', [AdminController::class, 'delete'])
    ->name('admin.delete')
    ->middleware('is_admin');
Route::get('admin/edit/{id}', [AdminController::class, 'show'])
    ->name('admin.edit')
    ->middleware('is_admin');
Route::post('admin/update/{id}', [AdminController::class, 'update'])
    ->name('admin.update')
    ->middleware('is_admin');


    // Kategori
Route::get('admin/Kategori', [AdminController::class, 'Kategori'])
    ->name('admin.Kategori')
    ->middleware();
Route::get('admin/TambahKategori', [AdminController::class, 'TambahKategori'])
    ->name('admin.TambahKategori')
    ->middleware('is_admin');
Route::post('admin/createKategori', [AdminController::class, 'createKategori'])
    ->name('admin.createKategori')
    ->middleware('is_admin');
Route::get('admin/Rubah/{id}', [AdminController::class, 'edit'])
    ->name('admin.Rubah')
    ->middleware('is_admin');
Route::post('admin/updateKategori/{id}', [AdminController::class, 'updateKategori'])
    ->name('admin.updateKategori')
    ->middleware('is_admin');
Route::get('admin/Hapus/{id}', [AdminController::class, 'Hapus'])
    ->name('admin.Hapus')
    ->middleware('is_admin');

    // Merek
Route::get('admin/Merek', [AdminController::class, 'Merek'])
    ->name('admin.Merek')
    ->middleware();
Route::get('admin/TambahMerekBarang', [AdminController::class, 'TambahMerekBarang'])
    ->name('admin.TambahMerekBarang')
    ->middleware('is_admin');
Route::post('admin/storeMerekBarang', [AdminController::class, 'storeMerekBarang'])
    ->name('admin.storeMerekBarang')
    ->middleware('is_admin');
Route::get('admin/editMerekBarang/{id}', [AdminController::class, 'editMerek'])
    ->name('admin.editMerekBarang')
    ->middleware('is_admin');
Route::post('admin/updateMerekBarang/{id}', [AdminController::class, 'updateMerek'])
    ->name('admin.updateMerekBarang')
    ->middleware('is_admin');
Route::get('admin/HapusMerekBarang/{id}', [AdminController::class, 'HapusMerek'])
    ->name('admin.HapusMerekBarang')
    ->middleware('is_admin');



// produk

Route::get('admin/Produk', [AdminController::class, 'Produk'])
    ->name('admin.produk')
    ->middleware();
Route::get('admin/TambahProduk', [AdminController::class, 'TambahProduk'])
    ->name('admin.TambahProduk')
    ->middleware('is_admin');
Route::post('admin/storeProduk', [AdminController::class, 'storeProduk'])
    ->name('admin.storeProduk')
    ->middleware('is_admin');
Route::get('admin/RubahProduk/{id}', [AdminController::class, 'RubahProduk'])
    ->name('admin.RubahProduk')
    ->middleware('is_admin');
Route::post('admin/updateProduk/{id}', [AdminController::class, 'updateProduk'])
    ->name('admin.updateProduk')
    ->middleware('is_admin');
Route::get('admin/HapusProduk/{id}', [AdminController::class, 'HapusProduk'])
    ->name('admin.HapusProduk')
    ->middleware('is_admin');

Route::get('admin/Laporan', [AdminController::class, 'Laporan'])
    ->name('admin.Laporan')
    ->middleware();

Route::get('admin/PrintPdf', [AdminController::class, 'Print'])
    ->name('admin.PrintPdf')
    ->middleware();


// Route::post('admin/products', [ProductController::class, 'store'])
//     ->name('admin.product.submit')
//     ->middleware('is_admin');
// Route::patch('admin/products/update', [ProductController::class, 'update'])
//     ->name('admin.product.update')
//     ->middleware('is_admin');

// Route::get('admin/ajaxadmin/dataProduk/{id}', [ProductController::class, 'getDataProduk']);
// Route::delete('admin/products/delete', [ProductController::class, 'destroy'])
//     ->name('admin.product.delete')
//     ->middleware('is_admin');

// //PRINT PDF
// Route::get('admin/print_books', [AdminController::class, 'print_books'])
// ->name('admin.print.products')
// ->middleware('is_admin');
