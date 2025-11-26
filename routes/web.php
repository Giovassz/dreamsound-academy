<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\InstrumentoController;
use App\Http\Controllers\ClaseController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin routes
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Users management
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
    });
    
    // Admin and Staff routes
    Route::prefix('admin')->middleware('role:admin,staff')->group(function () {
        // Alumnos
        Route::resource('alumnos', AlumnoController::class)->names([
            'index' => 'admin.alumnos.index',
            'create' => 'admin.alumnos.create',
            'store' => 'admin.alumnos.store',
            'edit' => 'admin.alumnos.edit',
            'update' => 'admin.alumnos.update',
            'destroy' => 'admin.alumnos.destroy',
        ]);
        
        // Instrumentos
        Route::resource('instrumentos', InstrumentoController::class)->names([
            'index' => 'admin.instrumentos.index',
            'create' => 'admin.instrumentos.create',
            'store' => 'admin.instrumentos.store',
            'edit' => 'admin.instrumentos.edit',
            'update' => 'admin.instrumentos.update',
            'destroy' => 'admin.instrumentos.destroy',
        ]);
        
        // Clases
        Route::resource('clases', ClaseController::class)->names([
            'index' => 'admin.clases.index',
            'create' => 'admin.clases.create',
            'store' => 'admin.clases.store',
            'edit' => 'admin.clases.edit',
            'update' => 'admin.clases.update',
            'destroy' => 'admin.clases.destroy',
        ]);
    });
    
    // Staff routes
    Route::prefix('staff')->middleware('role:staff')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('staff.dashboard');
    });
    
    // Client routes
    Route::prefix('client')->middleware('role:client')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
    });
});

