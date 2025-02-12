<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupEconomicRequest;
use App\Models\GroupEconomic;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class GroupEconomicController extends Controller
{
    public function index(): JsonResponse
    {
        $group = GroupEconomic::orderBy('id', 'asc')->paginate(10);
        return response()->json($group);
    }

    public function show(GroupEconomic $group): JsonResponse
    {
        return response()->json( $group);
    }

    public function store(GroupEconomicRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $group = GroupEconomic::create([
                'name' => $request->name,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Grupo Economico cadastrado com sucesso',
                'data' => $group,
            ],201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Grupo Economico não cadastrado',
                'error' => $e->getMessage(),
            ], 400);
        }


    }

    public function update(GroupEconomicRequest $request, GroupEconomic $group): JsonResponse
    {
        DB::beginTransaction();

        try {
            $group->update([
                'name' => $request->name,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Grupo Economico atualizado com sucesso',
                'data' => $group,
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Grupo Economico não atualizado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(GroupEconomic $group): JsonResponse
    {
        DB::beginTransaction();

        try {
            $group->delete();
            DB::commit();

            return response()->json([
                'message' => 'Grupo Economico deletado com sucesso',
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Grupo Economico não deletado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
