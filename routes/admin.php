<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Http\Controllers\Admin\UserController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'employees' ,'as' => 'employees.' ], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::delete('/{employee}', [UserController::class, 'destroy'])->name('destroy');
});
