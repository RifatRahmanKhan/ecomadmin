<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorDetailsController;
use App\Http\Controllers\SiteInfoController;

Route::get('/getVisitorDetails', [VisitorDetailsController::class, 'getVisitorDetails']);
Route::get('/sendSiteInfo', [SiteInfoController::class, 'sendSIteInfo']);
