<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Units;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function unit( Request $request): JsonResponse
    {
        $unitId = $request->id;
        $employers = Units::where('id', $unitId)->with('employers')->get();
        return response()->json(['report' => $employers]);
    }

    public function allUnitsEmployers(): JsonResponse
    {
        $report = Units::with('employers')->get();
        return response()->json(['report' => $report]);
    }
}
