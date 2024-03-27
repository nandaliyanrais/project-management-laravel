<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
// Route::get('/projects/{projectId}/tasks', [TaskController::class, 'index'])->name('tasks.index');
// Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
// Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
// Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
// Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
// Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

// Route::get('/projects/{projectId}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
// Route::post('/projects/{projectId}/tasks', [TaskController::class, 'store'])->name('tasks.store');
// Route::get('/projects/{projectId}/tasks/{taskId}', [TaskController::class, 'show'])->name('tasks.show');
// Route::get('/projects/{projectId}/tasks/{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
// Route::put('/projects/{projectId}/tasks/{taskId}', [TaskController::class, 'update'])->name('tasks.update');
// Route::delete('/projects/{projectId}/tasks/{taskId}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/projects/{project}/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/projects/{project}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/projects/{project}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');