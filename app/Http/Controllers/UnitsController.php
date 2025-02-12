<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsRequest;
use App\Models\Units;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Units::orderBy('id', 'asc')->paginate(10);
        return response()->json($units);
    }

    public function show(Units $unit): JsonResponse
    {
        return response()->json( $unit);
    }

    public function store(UnitsRequest $request): JsonResponse
    {

        DB::beginTransaction();
        try {
            $unit = Units::create([
                'trade_name' => $request->trade_name,
                'corporate_name' => $request->corporate_name,
                'cnpj' => $request->cnpj,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Unidade cadastrado com sucesso',
                'data' => $unit,
            ],201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Unidade não cadastrado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function update(UnitsRequest $request, Units $unit): JsonResponse
    {
        DB::beginTransaction();

        try {
            $unit->update([
                'trade_name' => $request->trade_name,
                'corporate_name' => $request->corporate_name,
                'cnpj' => $request->cnpj,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'unidade atualizado com sucesso',
                'data' => $unit,
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Unidade não atualizado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Units $unit)
    {
        DB::beginTransaction();

        try {
            $unit->delete();
            DB::commit();

            return response()->json([
                'message' => 'Unidade deletado com sucesso',
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Unidade não deletado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
