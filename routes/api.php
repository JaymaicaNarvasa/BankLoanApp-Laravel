<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenthicationController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\ManageuserController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationStatusController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register', [AuthenthicationController::class, 'register']);
Route::post('/login', [AuthenthicationController::class, 'login']);
Route::put('/reset-password/{id}', [AuthenthicationController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthenthicationController::class, 'logout']);
//profile
    Route::get('/get-profile', [ProfileController::class, 'getProfile']);
    Route::put('/edit-profile', [ProfileController::class, 'editProfile']);
    Route::put('/change-password', [ProfileController::class, 'changePassword']);
//manageuser
    Route::get('/get-users', [ManageuserController::class, 'getUsers']);
    Route::post('/add-user', [ManageuserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [ManageuserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [ManageuserController::class, 'deleteUser']);
//userstatus
    Route::get('/get-user-statuses', [UserStatusController::class, 'getUserStatuses']);
    Route::post('/add-user-status', [UserStatusController::class, 'addUserStatus']);
    Route::put('/edit-user-status/{id}', [UserStatusController::class, 'editUserStatus']);
    Route::delete('/delete-user-status/{id}', [UserStatusController::class, 'deleteUserStatus']);
//application
    Route::get('/get-apps', [ApplicationController::class, 'getLoans']);
    Route::post('/add-app', [ApplicationController::class, 'addLoan']);
    Route::put('/edit-app/{id}', [ApplicationController::class, 'editLoan']);
    Route::delete('/delete-app/{id}', [ApplicationController::class, 'deleteLoan']);
//applicationStatus
    Route::get('/get-app-statuses', [ApplicationStatusController::class, 'getLoanStatuses']);
    Route::post('/add-app-status', [ApplicationStatusController::class, 'addLoanStatus']);
    Route::put('/edit-app-status/{id}', [ApplicationStatusController::class, 'editLoanStatus']);
    Route::delete('/delete-app-status/{id}', [ApplicationStatusController::class, 'deleteLoanStatus']);
//role
    Route::get('/get-roles', [RoleController::class, 'getRoles']);
    Route::post('/add-role', [RoleController::class, 'addRole']);
    Route::put('/edit-role/{id}', [RoleController::class, 'editRole']);
    Route::delete('/delete-role/{id}', [RoleController::class, 'deleteRole']);
});
