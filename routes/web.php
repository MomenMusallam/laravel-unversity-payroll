<?php
use App\Http\Controllers\FullTimeEmployeeController;
use App\Http\Controllers\PartTimeEmployeeController;
use App\Http\Controllers\PartTimeEmployeeHourWorkedController;


use Illuminate\Support\Facades\Route;

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
//admin
Route::get('/admin/full-time', [FullTimeEmployeeController::class, 'index'])->name('full-time.index');
Route::get('/admin/full-time/create', [FullTimeEmployeeController::class, 'create'])->name('full-time.create');
Route::post('/admin/full-time', [FullTimeEmployeeController::class, 'store'])->name('full-time.store');
Route::get('/admin/full-time/{id}', [FullTimeEmployeeController::class, 'show'])->name('full-time.show');
Route::get('/admin/full-time/{id}/edit', [FullTimeEmployeeController::class, 'edit'])->name('full-time.edit');
Route::post('/admin/full-time/{id}', [FullTimeEmployeeController::class, 'update'])->name('full-time.update');
Route::get('/admin/full-time/{id}/delete', [FullTimeEmployeeController::class, 'destroy'])->name('full-time.destroy');

Route::get('/admin/part-time', [PartTimeEmployeeController::class, 'index'])->name('part-time.index');
Route::get('/admin/part-time/create', [PartTimeEmployeeController::class, 'create'])->name('part-time.create');
Route::post('/admin/part-time', [PartTimeEmployeeController::class, 'store'])->name('part-time.store');
Route::get('/admin/part-time/{id}', [PartTimeEmployeeController::class, 'show'])->name('part-time.show');
Route::get('/admin/part-time/{id}/edit', [PartTimeEmployeeController::class, 'edit'])->name('part-time.edit');
Route::post('/admin/part-time/{id}', [PartTimeEmployeeController::class, 'update'])->name('part-time.update');
Route::get('/admin/part-time/{id}/delete', [PartTimeEmployeeController::class, 'destroy'])->name('part-time.destroy');


//full time employee
Route::get('/full-time', [FullTimeEmployeeController::class, 'fullTimeIndex'])->name('fulltime.index');
Route::get('/full-time/profile', [FullTimeEmployeeController::class, 'profile'])->name('full-time.profile');
Route::post('/full-time/profile/edit', [FullTimeEmployeeController::class, 'updateProfile'])->name('full-time.updateProfile');


//part time employee
Route::get('/part-time', [PartTimeEmployeeController::class, 'fullTimeIndex'])->name('parttime.index');
Route::get('/part-time/profile', [PartTimeEmployeeController::class, 'profile'])->name('part-time.profile');
Route::post('/part-time/profile/edit', [PartTimeEmployeeController::class, 'updateProfile'])->name('part-time.updateProfile');
//worked hours
Route::get('/part-time/workinghours', [PartTimeEmployeeHourWorkedController::class, 'index'])->name('workinghours.index');
Route::get('/part-time/workinghours/create', [PartTimeEmployeeHourWorkedController::class, 'create'])->name('workinghours.create');
Route::post('/part-time/workinghours', [PartTimeEmployeeHourWorkedController::class, 'store'])->name('workinghours.store');
Route::get('/part-time/workinghours/{id}/delete', [PartTimeEmployeeHourWorkedController::class, 'destroy'])->name('workinghours.destroy');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
