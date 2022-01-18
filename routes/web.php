<?php
use App\Http\Controllers\FullTimeEmployeeController;
use App\Http\Controllers\PartTimeEmployeeController;
use App\Http\Controllers\PartTimeEmployeeHourWorkedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\VacationController;


use Illuminate\Support\Facades\Auth;
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
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('adminmiddleware');
Route::get('/admin/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware('adminmiddleware');
Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.update')->middleware('adminmiddleware');

Route::get('/admin/full-time', [FullTimeEmployeeController::class, 'index'])->name('full-time.index')->middleware('adminmiddleware');
Route::get('/admin/full-time/create', [FullTimeEmployeeController::class, 'create'])->name('full-time.create')->middleware('adminmiddleware');
Route::post('/admin/full-time', [FullTimeEmployeeController::class, 'store'])->name('full-time.store')->middleware('adminmiddleware');
Route::get('/admin/full-time/{id}', [FullTimeEmployeeController::class, 'show'])->name('full-time.show')->middleware('adminmiddleware');
Route::get('/admin/full-time/{id}/edit', [FullTimeEmployeeController::class, 'edit'])->name('full-time.edit')->middleware('adminmiddleware');
Route::post('/admin/full-time/{id}', [FullTimeEmployeeController::class, 'update'])->name('full-time.update')->middleware('adminmiddleware');
Route::get('/admin/full-time/{id}/delete', [FullTimeEmployeeController::class, 'destroy'])->name('full-time.destroy')->middleware('adminmiddleware');

Route::get('/admin/part-time', [PartTimeEmployeeController::class, 'index'])->name('part-time.index')->middleware('adminmiddleware');
Route::get('/admin/part-time/create', [PartTimeEmployeeController::class, 'create'])->name('part-time.create')->middleware('adminmiddleware');
Route::post('/admin/part-time', [PartTimeEmployeeController::class, 'store'])->name('part-time.store')->middleware('adminmiddleware');
Route::get('/admin/part-time/{id}', [PartTimeEmployeeController::class, 'show'])->name('part-time.show')->middleware('adminmiddleware');
Route::get('/admin/part-time/{id}/edit', [PartTimeEmployeeController::class, 'edit'])->name('part-time.edit')->middleware('adminmiddleware');
Route::post('/admin/part-time/{id}', [PartTimeEmployeeController::class, 'update'])->name('part-time.update')->middleware('adminmiddleware');
Route::get('/admin/part-time/{id}/delete', [PartTimeEmployeeController::class, 'destroy'])->name('part-time.destroy')->middleware('adminmiddleware');
Route::get('/admin/part-time/{id}/hours', [PartTimeEmployeeHourWorkedController::class, 'userHours'])->name('part-time.hours')->middleware('adminmiddleware');
//salary
Route::get('/admin/salary', [SalaryController::class, 'index'])->name('salary.index')->middleware('adminmiddleware');
Route::get('/admin/salary/pay/{id}', [SalaryController::class, 'payForEmployee'])->name('pays.index')->middleware('adminmiddleware');
Route::get('/admin/salary/payall/', [SalaryController::class, 'payForAllEmployess'])->name('payAll.index')->middleware('adminmiddleware');
Route::get('/admin/salary/history/{id}', [SalaryController::class, 'showHistory'])->name('history.view')->middleware('adminmiddleware');
Route::get('/admin/salary/exports', [SalaryController::class, 'exports'])->name('exports.view')->middleware('adminmiddleware');
Route::get('/admin/salary/invoice/{id}', [SalaryController::class, 'invoice'])->name('salary.invoice')->middleware('adminmiddleware');


//vacations
Route::get('/admin/vacations', [VacationController::class, 'adminIndex'])->name('admin.vacation')->middleware('adminmiddleware');
Route::get('/admin/vacations/{id}', [VacationController::class, 'aprove'])->name('admin.vacation.approve')->middleware('adminmiddleware');
Route::get('/admin/user/vacations/{id}', [VacationController::class, 'history'])->name('admin.vacation.history')->middleware('adminmiddleware');

//full time employee
Route::get('/full-time', [FullTimeEmployeeController::class, 'dashboard'])->name('fulltime.index')->middleware('fullTimemiddleware');
Route::get('/full-time/profile', [FullTimeEmployeeController::class, 'profile'])->name('full-time.profile')->middleware('fullTimemiddleware');
Route::post('/full-time/profile/edit', [FullTimeEmployeeController::class, 'updateProfile'])->name('full-time.updateProfile')->middleware('fullTimemiddleware');
//vacations
Route::get('/full-time/vacation', [VacationController::class, 'index'])->name('vacation.index')->middleware('fullTimemiddleware');
Route::get('/full-time/vacation/create', [VacationController::class, 'create'])->name('vacation.create')->middleware('fullTimemiddleware');
Route::post('/full-time/vacation', [VacationController::class, 'store'])->name('vacation.store')->middleware('fullTimemiddleware');
Route::get('/full-time/vacation/{id}/delete', [VacationController::class, 'destroy'])->name('vacation.destroy')->middleware('fullTimemiddleware');
//income
Route::get('/full-time/income', [FullTimeEmployeeController::class, 'incomes'])->name('fulltime.incomes')->middleware('fullTimemiddleware');
Route::get('/full-time/invoice/{id}', [SalaryController::class, 'fulltimeinvoice'])->name('fulltime.salary.invoice')->middleware('fullTimemiddleware');


//part time employee
Route::get('/part-time', [PartTimeEmployeeController::class, 'dashboard'])->name('parttime.index')->middleware('partTimemiddleware');
Route::get('/part-time/profile', [PartTimeEmployeeController::class, 'profile'])->name('part-time.profile')->middleware('partTimemiddleware');
Route::post('/part-time/profile/edit', [PartTimeEmployeeController::class, 'updateProfile'])->name('part-time.updateProfile')->middleware('partTimemiddleware');
//worked hours
Route::get('/part-time/workinghours', [PartTimeEmployeeHourWorkedController::class, 'index'])->name('workinghours.index')->middleware('partTimemiddleware');
Route::get('/part-time/workinghours/create', [PartTimeEmployeeHourWorkedController::class, 'create'])->name('workinghours.create')->middleware('partTimemiddleware');
Route::post('/part-time/workinghours', [PartTimeEmployeeHourWorkedController::class, 'store'])->name('workinghours.store')->middleware('partTimemiddleware');
Route::get('/part-time/workinghours/{id}/delete', [PartTimeEmployeeHourWorkedController::class, 'destroy'])->name('workinghours.destroy')->middleware('partTimemiddleware');
//income
Route::get('/part-time/income', [PartTimeEmployeeController::class, 'incomes'])->name('parttime.incomes')->middleware('partTimemiddleware');
Route::get('/part-time/invoice/{id}', [SalaryController::class, 'parttimeinvoice'])->name('parttime.salary.invoice')->middleware('partTimemiddleware');







Route::get('/dashboard', function () {
    if(Auth::user()->user_type == "admin"){
        return redirect()->route('admin.index');
    }elseif(Auth::user()->user_type == "fulltime"){
        return redirect()->route('fulltime.index');
    }elseif(Auth::user()->user_type == "parttime"){
        return redirect()->route('parttime.index');
    }
    return redirect()->route('');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
