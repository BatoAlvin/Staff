<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffroleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/',  [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');


Route::resource('staff', StaffController::class)->middleware('auth');
Route::post('/search', [StaffController::class, 'search'])->name('search')
->middleware('auth');
Route::get('exportstaff/', [StaffController::class, 'export'])->name('exportstaff')->middleware('auth');
Route::post('enroll/{id}', [StaffController::class, 'enroll'])->name('enroll')->middleware('auth');



Route::resource('staffrole', StaffroleController::class)->middleware('auth');
Route::get('exportstaffrole/', [StaffroleController::class, 'export'])->name('exportstaffrole')->middleware('auth');
Route::post('validatestaffrole', [StaffroleController::class, 'validatestaff'])->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

require __DIR__.'/auth.php';
