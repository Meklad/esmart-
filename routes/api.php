<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\CampaignController;

Route::controller(CampaignController::class)->group(function () {
    Route::get('v1/campaigns', 'index');
    Route::post('v1/campaigns', 'store');
    Route::get('v1/campaigns/{campaign}', 'show');
    Route::post('v1/campaigns/{campaign}', 'update');
    Route::delete('v1/campaigns/{campaign}', 'destroy');
    Route::delete('v1/campaigns/delete-capmaign-images/{campaign}', 'deleteCapmaignImages');
});
