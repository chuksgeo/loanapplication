<?php

use App\Http\Controllers\LoanApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    Route::post('/api/partner/loan/apply', [LoanApplicationController::class, 'store'])->name('loan.application.store');

});
