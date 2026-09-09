<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('projects/{project}')->name('projects.')->group(function () {
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
});

Route::prefix('tasks/{task}')->name('tasks.')->group(function () {
    Route::get('edit', [TaskController::class, 'edit'])->name('edit');
    Route::put('/', [TaskController::class, 'update'])->name('update');
    Route::delete('/', [TaskController::class, 'destroy'])->name('destroy');
    Route::patch('status', [TaskController::class, 'updateStatus'])->name('updateStatus');
});