<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    
    Route::get('employee', [App\Http\Controllers\employeecontroller::class, 'index']);
    Route::post('employee', [App\Http\Controllers\employeecontroller::class, 'index']);
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('employee', [App\Http\Controllers\employeecontroller::class, 'index'])->name('employee.index');
    Route::get('employees/created', [App\Http\Controllers\employeecontroller::class, 'create'])->name('employee.create');
    Route::post('employee', [App\Http\Controllers\employeecontroller::class, 'store'])->named('employee.store');
    Route::get('employee/{id}/edit', [App\Http\Controllers\employeecontroller::class, 'edit'])->name('employee.edit');
    Route::put('employee/{id}/update', [App\Http\Controllers\employeecontroller::class, 'edit'])->name('employee.update');
    Route::get('employee/{id}/destroy', [App\Http\Controllers\employeecontroller::class, 'destroy'])->named('employee.delete');

    






    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
