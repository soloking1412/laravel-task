<?php

use Illuminate\Support\Facades\Route;
use Modules\Newsletter\Http\Controllers\NewsletterController;

Route::prefix('newsletter')->group(function() {
    Route::get('/', [NewsletterController::class, 'index']);
    Route::post('/subscribe', [NewsletterController::class, 'subscribe']);
});
