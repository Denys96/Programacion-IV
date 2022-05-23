<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
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
//Admin-------------------------------------------------------------------------------------------------
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('revisar/{id}/venta', [HomeController::class, 'sell'])->name('home.sell');
Route::put('venta/enviado', [HomeController::class, 'sent'])->name('home.sent');
Route::delete('venta/eliminar', [HomeController::class, 'destroy'])->name('home.destroy');
Route::put('venta/cancelado', [HomeController::class, 'cancel'])->name('home.cancel');
// Categories----------------------------------------------------------------------------------
Route::get('/admin/categorias', [CategoryController::class, 'index'])->name('categoria');
Route::post('/admin/guardar/categorias', [CategoryController::class, 'store'])->name('category.store');
Route::put('/admin/actualizar/categoria', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/admin/eliminar/categoria', [CategoryController::class, 'destroy'])->name('category.destroy');
//Products-----------------------------------------------------------------------------------
Route::get('/admin/productos', [ProductController::class,'index'])->name('producto');
Route::post('/admin/guardar/producto', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/producto/{id}/editar', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/admin/actualizar/producto', [ProductController::class, 'update'])->name('product.update');
Route::delete('/admin/eliminar/producto', [ProductController::class, 'destroy'])->name('product.destroy');
//Images -----------------------------------------------------------------------------------
Route::delete('/admin/eliminar/image', [ImageController::class, 'destroy'])->name('image.destroy');
//Client----------------------------------------------------------------------------------------
Route::get('/', [ClientController::class,'index'])->name('welcome');
Route::get('/producto/{id}/detalles', [ClientController::class,'show'])->name('client.show');
Route::post('/producto/busqueda/in-the-system', [ClientController::class,'search'])->name('client.search');
Route::post('/producto/agregar/carrito', [ClientController::class,'add'])->name('client.add');
Route::get('/carrito', [ClientController::class,'car'])->name('client.car');
Route::post('/producto/borrar/carrito', [ClientController::class,'forget'])->name('client.forget');
Route::get('/cliente/datos/de/envio/', [ClientController::class,'data'])->name('client.data');
Route::post('/cliente/datos/de/envio/', [ClientController::class,'datastore'])->name('client.data.store');
Route::get('/gracias', [ClientController::class,'notice'])->name('client.notice');
