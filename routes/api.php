<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

// users CRUD
Route::get('/users', [UserController::class, 'all']); // Get all users
Route::post('/users', [UserController::class, 'create']); // Create a new user
Route::get('/users/{id}', [UserController::class, 'get']); // Get a specific user
Route::put('/users/{id}', [UserController::class, 'update']); // Update a user
Route::delete('/users/{id}', [UserController::class, 'remove']); // Delete a user

// Tickets CRUD
Route::get('/tickets', [TicketController::class, 'all']); // Get all tickets
Route::post('/tickets', [TicketController::class, 'create']); // Create a new ticket
Route::get('/tickets/{id}', [TicketController::class, 'get']); // Get a specific ticket
Route::put('/tickets/{id}', [TicketController::class, 'update']); // Update a ticket
Route::delete('/tickets/{id}', [TicketController::class, 'remove']); // Delete a ticket
