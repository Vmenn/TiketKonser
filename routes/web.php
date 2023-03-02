<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth',])->group(function () {
    route::controller(HomeController::class)->group(function () {
        Route::get('/user/logout',  'UserDestroy')->name('user.logout');
    });
    //Order
    route::controller(OrderController::class)->group(function () {
        Route::get('/tiket/detail/{id}', 'detail')->name('tiket.detail');
        Route::post('/tiket/order/', 'OrderTiket')->name('tiket.order');
        Route::get('/orderan', 'index')->name('orderan');
    });
});

route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::middleware(['auth', 'admin'])->group(function () {
    route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/admin/logout',  'AdminDestroy')->name('admin.logout');
    });

    // TIket
    route::controller(TiketController::class)->group(function () {
        Route::get('/tiket', 'index')->name('tiket');
        Route::post('/tiket/add', 'AddTiket')->name('tiket.add');
        Route::get('/tiket/edit/{id}', 'EditTiket')->name('tiket.edit');
        Route::post('/tiket/update', 'UpdateTiket')->name('tiket.update');
        Route::get('/tiket/inactive/{id}', 'TiketInActive')->name('tiket.inactive');
        Route::get('/tiket/active/{id}', 'TiketActive')->name('tiket.active');
        Route::get('/tiket/delete/{id}', 'DeleteTiket')->name('tiket.delete');
    });


    // TIket
    route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan', 'pesanan')->name('pesanan');
        Route::get('/pesanan/checkin/{id}', 'Checkin')->name('checkin');
    });
});


require __DIR__ . '/auth.php';
