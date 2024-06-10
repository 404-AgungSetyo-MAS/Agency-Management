<?php

use App\Http\Controllers\MonetaryController;
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

Route::resource('Monetaries', MonetaryController::class);

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');
