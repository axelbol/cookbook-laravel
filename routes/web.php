<?php

use App\Http\Controllers\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/charts', function () {
    // 2024
    $thisYearOrders = Order::query()
        ->whereYear('created_at', date('Y') - 1)
        ->groupByMonth('month');
        // ->selectRaw('month(created_at) as month')
        // ->selectRaw('count(*) as count')
        // ->groupBy('month')
        // ->orderBy('month')
        // ->pluck('count', 'month')
        // ->values()
        // ->toArray();

        // ->get()
        // ->dd();

        // 2023
    $lastYearOrders = Order::query()
        ->whereYear('created_at', date('Y') - 2)
        ->groupByMonth('month');

    return view('charts', [
        'thisYearOrders' => $thisYearOrders,
        'lastYearOrders' => $lastYearOrders,
    ]);
});

require __DIR__.'/auth.php';
