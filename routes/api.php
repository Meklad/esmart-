<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\CampaignController;

Route::apiResource("v1/campaigns", CampaignController::class);
