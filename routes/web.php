<?php 

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('index');
}) -> name('index');

// Rutas de clientes
Route::resource('/clients', ClientController::class);


Route::resource('clients', ClientController::class);

// Ruta para eliminar cliente
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('clients/{client}/delete', [ClientController::class, 'destroyConfirm'])->name('clients.destroyConfirm');

// Rutas de personal (staff)
Route::resource('/staff', StaffController::class);

// Rutas de mesas
Route::resource('/tables', TableController::class);

// Rutas de reservas
Route::resource('/reservations', ReservationController::class);

// Rutas para eliminar reservas
Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
Route::get('reservations/{reservation}/delete', [ReservationController::class, 'destroyConfirm'])->name('reservations.destroyConfirm');

// Rutas para eliminar personal
Route::delete('staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
Route::get('staff/{staff}/delete', [StaffController::class, 'destroyConfirm'])->name('staff.destroyConfirm');

// Rutas para eliminar mesas
Route::delete('tables/{table}', [TableController::class, 'destroy'])->name('tables.destroy');
Route::get('tables/{table}/delete', [TableController::class, 'destroyConfirm'])->name('tables.destroyConfirm');


Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');



Route::resource('tables', TableController::class);


Route::resource('reservations', ReservationController::class);
Route::post('/reservations/check_availability', [ReservationController::class, 'checkAvailability'])->name('reservations.check_availability');
Route::post('/tables/check-number-existence', [TableController::class, 'checkTableNumberExistence']);
