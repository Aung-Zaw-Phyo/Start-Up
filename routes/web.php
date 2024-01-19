<?php

use App\Filament\Pages\AppUserView;
use App\Filament\Pages\UserView;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/app-user/view/{id}', AppUserView::class)->name('app_user.view');
Route::get('/admin/user/view/{id}', UserView::class)->name('user.view');
