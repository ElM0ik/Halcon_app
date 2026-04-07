<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;

// Public tracking
Route::get('/', [TrackingController::class, 'index'])->name('tracking.index');
Route::post('/track', [TrackingController::class, 'search'])->name('tracking.search');

// Auth
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Serve evidence images securely
    Route::get('/evidence/{filename}', function ($filename) {
        $path = storage_path('app/private/evidences/' . $filename);
        abort_unless(file_exists($path), 404);
        return response()->file($path);
    })->name('evidence.show');

    // Employees — Admin only
    Route::resource('employees', EmployeeController::class)
        ->middleware('department:Admin');

    // Orders — Sales, Warehouse, Route, Admin
    Route::resource('orders', OrderController::class)
        ->middleware('department:Admin,Sales,Warehouse,Route');

    Route::get('/orders-archived', [OrderController::class, 'archived'])
        ->name('orders.archived');

    Route::patch('/orders/{order}/restore', [OrderController::class, 'restore'])
        ->name('orders.restore');
});
