<?php

use App\Controllers\ProblemsController;
use Core\Router\Route;

Route::get('/', [ProblemsController::class, 'index'])->name('root');

Route::get('/problems/new', [ProblemsController::class, 'new'])->name('problems.new');
Route::post('/problems', [ProblemsController::class, 'create'])->name('problems.create');

Route::get('/problems', [ProblemsController::class, 'index'])->name('problems.index');
Route::get('/problems/{id}', [ProblemsController::class, 'show'])->name('problems.show');

Route::get('/problems/{id}/edit', [ProblemsController::class, 'edit'])->name('problems.edit');
Route::put('/problems/{id}', [ProblemsController::class, 'update'])->name('problems.update');

Route::delete('/problems/{id}', [ProblemsController::class, 'destroy'])->name('problems.destroy');
