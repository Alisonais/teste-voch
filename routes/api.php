<?php

use App\Http\Controllers\GroupEconomicController;
use App\Models\GroupEconomic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/group',[GroupEconomicController::class, 'index']);
// get http://localhost:8000/api/group?page=1

route::get('/group/{group}',[GroupEconomicController::class, 'show']);
// get http://localhost:8000/api/group/1

route::post('/group',[GroupEconomicController::class, 'store']);
// post http://localhost:8000/api/group

route::put('/group/{group}',[GroupEconomicController::class, 'update']);
// put http://localhost:8000/api/group/1

route::delete('/group/{group}',[GroupEconomicController::class, 'destroy']);
