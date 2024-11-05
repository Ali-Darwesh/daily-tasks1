<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
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


Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index'); // Show all tasks (index)
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Show form to create a new task
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store'); // Store a new task
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Show a specific task's details
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show form to edit a task
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Update a specific task
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete a specific task

// Custom route for updating task status
Route::put('tasks/{task}/status', [TaskController::class, 'updateTaskStatus'])->name('tasks.updateStatus');