<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Project routes
    Route::prefix('project')->group(function () {
        Route::get('create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('store', [ProjectController::class, 'store'])->name('project.store');
        Route::delete('delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
          });

    // Milestone routes
    Route::prefix('milestone')->group(function () {
        Route::get('create', [MilestoneController::class, 'create'])->name('milestone.create');
        Route::post('', [MilestoneController::class, 'store'])->name('milestone.store');
        Route::delete('delete/{id}', [MilestoneController::class, 'delete'])->name('milestone.delete');
        Route::put('', [ProjectController::class, 'update'])->name('milestone.update');
    });

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Comment routes
    Route::prefix('comment')->group(function () {
        Route::post('reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
        Route::post('store', [CommentController::class, 'store'])->name('comment.add');
    });
});
Route::get('/project/{id}', [ProjectController::class, 'getProject'])->name('project.single');

require __DIR__.'/auth.php';
