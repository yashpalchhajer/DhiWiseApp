<?php

use App\Http\Controllers\API\Device\AuthController;
use App\Http\Controllers\API\Device\ManufacturerController;
use App\Http\Controllers\API\Device\MedicineController;
use App\Http\Controllers\API\Device\MoleculeController;
use App\Http\Controllers\API\Device\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'validate.user']], function () {
});

Route::get('medicines', [MedicineController::class, 'index'])
    ->name('medicines.index');
Route::get('medicines/{medicine}', [MedicineController::class, 'show'])
    ->name('medicine.show');
Route::post('medicines', [MedicineController::class, 'store'])
    ->name('medicine.store');
Route::put('medicines/{medicine}', [MedicineController::class, 'update'])
    ->name('medicine.update');
Route::delete('medicines/{medicine}', [MedicineController::class, 'delete'])
    ->name('medicine.delete');
Route::post('medicines/bulk-create', [MedicineController::class, 'bulkStore'])
    ->name('medicine.store.bulk');
Route::post('medicines/bulk-update', [MedicineController::class, 'bulkUpdate'])
    ->name('medicine.update.bulk');
Route::get('molecules', [MoleculeController::class, 'index'])
    ->name('molecules.index');
Route::get('molecules/{molecule}', [MoleculeController::class, 'show'])
    ->name('molecule.show');
Route::post('molecules', [MoleculeController::class, 'store'])
    ->name('molecule.store');
Route::put('molecules/{molecule}', [MoleculeController::class, 'update'])
    ->name('molecule.update');
Route::delete('molecules/{molecule}', [MoleculeController::class, 'delete'])
    ->name('molecule.delete');
Route::post('molecules/bulk-create', [MoleculeController::class, 'bulkStore'])
    ->name('molecule.store.bulk');
Route::post('molecules/bulk-update', [MoleculeController::class, 'bulkUpdate'])
    ->name('molecule.update.bulk');
Route::get('manufacturers', [ManufacturerController::class, 'index'])
    ->name('manufacturers.index');
Route::get('manufacturers/{manufacturer}', [ManufacturerController::class, 'show'])
    ->name('manufacturer.show');
Route::post('manufacturers', [ManufacturerController::class, 'store'])
    ->name('manufacturer.store');
Route::put('manufacturers/{manufacturer}', [ManufacturerController::class, 'update'])
    ->name('manufacturer.update');
Route::delete('manufacturers/{manufacturer}', [ManufacturerController::class, 'delete'])
    ->name('manufacturer.delete');
Route::post('manufacturers/bulk-create', [ManufacturerController::class, 'bulkStore'])
    ->name('manufacturer.store.bulk');
Route::post('manufacturers/bulk-update', [ManufacturerController::class, 'bulkUpdate'])
    ->name('manufacturer.update.bulk');
Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])
    ->name('user.show');
Route::post('users', [UserController::class, 'store'])
    ->name('user.store');
Route::put('users/{user}', [UserController::class, 'update'])
    ->name('user.update');
Route::delete('users/{user}', [UserController::class, 'delete'])
    ->name('user.delete');
Route::post('users/bulk-create', [UserController::class, 'bulkStore'])
    ->name('user.store.bulk');
Route::post('users/bulk-update', [UserController::class, 'bulkUpdate'])
    ->name('user.update.bulk');

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:sanctum');
Route::put('change-password', [AuthController::class, 'changePassword'])
    ->name('change.password')
    ->middleware(['auth:sanctum', 'validate.user']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');
Route::post('validate-otp', [AuthController::class, 'validateResetPasswordOtp'])
    ->name('reset.password.validate.otp');
Route::put('reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');
