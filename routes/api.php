<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'message' => 'Hello World',
    ], 200);
})
// ->middleware('auth:sanctum')
;
