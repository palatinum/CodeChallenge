<?php

use CodeChallenge\Client\Infrastructure\Inputadapter\Http\APIRest\CreateClientController;
use CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest\CreateLeadController;
use CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest\DeleteLeadController;
use CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest\GetCreateLeadFormController;
use CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest\GetLeadByIdController;
use CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest\UpdateLeadController;
use Illuminate\Support\Facades\Route;

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

Route::post('/lead', CreateLeadController::class);
Route::get('/lead/form', GetCreateLeadFormController::class);
Route::get('/lead/create', GetCreateLeadFormController::class);
Route::get('/lead/{leadId}', GetLeadByIdController::class);
Route::put('/lead/{leadId}', UpdateLeadController::class);
Route::delete('/lead/{leadId}', DeleteLeadController::class);

Route::post('/client', CreateClientController::class);

