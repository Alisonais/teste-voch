<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brands;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function index(): JsonResponse
    {
        $brands = Brands::orderBy('id', 'asc')->paginate(10);
        return response()->json($brands);
    }

    public function store(BrandRequest $request)
    {
        DB::beginTransaction();

        try {
            $brand = Brands::create([
                'name' => $request->name,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Bandeira cadastrado com sucesso',
                'data' => $brand,
            ],201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Bandeira não cadastrado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(Brands $brands): JsonResponse
    {
        dd($brands);
        return response()->json( $brands);
    }

    public function update(BrandRequest $request, Brands $brands): JsonResponse
    {
        DB::beginTransaction();

        try {
            $brands->update([
                'name' => $request->name,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Bandeira atualizado com sucesso',
                'data' => $brands,
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Bandeira não atualizado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Brands $brands)
    {
        DB::beginTransaction();

        try {
            $brands->delete();
            DB::commit();

            return response()->json([
                'message' => 'Bandeira deletado com sucesso',
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Bandeira não deletado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
