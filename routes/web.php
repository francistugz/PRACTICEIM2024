<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

Route::resource('clients', ClientController::class);
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');


Route::resource('payments', PaymentController::class);

Route::resource('projects', ProjectController::class);

// Route to show the form for creating a new project
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route to store the new project
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');


Route::resource('invoices', InvoiceController::class);
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::delete('invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
