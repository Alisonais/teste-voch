<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\GroupEconomicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UnitsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('group', GroupEconomicController::class);

Route::apiResource('brand', brandsController::class);

Route::apiResource('unit', UnitsController::class);

Route::apiResource('employer', EmployerController::class);

route::get('report/unit/employers/{id}', [ReportController::class, 'unit']);
route::get('report/units/employers', [ReportController::class, 'allUnitsEmployers']);

