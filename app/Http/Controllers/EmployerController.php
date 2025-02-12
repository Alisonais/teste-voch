<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerRequest;
use App\Models\Employer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    public function index(): JsonResponse
    {
        $employer = Employer::orderBy('id', 'asc')->paginate(10);
        return response()->json($employer);
    }

    public function show(Employer $employer): JsonResponse
    {
        return response()->json( $employer);
    }

    public function store(EmployerRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $employer = Employer::create([
                'name' => $request->name,
                'email' => $request->email,
                'cpf' => $request->cpf,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Colaborador cadastrado com sucesso',
                'data' => $employer,
            ],201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Colaborador não cadastrado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function update(EmployerRequest $request, Employer $employer): JsonResponse
    {
        DB::beginTransaction();

        try {
            $employer->update([
                'name' => $request->name,
                'email' => $request->email,
                'cpf' => $request->cpf,
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Colaborador atualizado com sucesso',
                'data' => $employer,
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Colaborador não atualizado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Employer $employer): JsonResponse
    {
        DB::beginTransaction();

        try {
            $employer->delete();
            DB::commit();

            return response()->json([
                'message' => 'Colaborador deletado com sucesso',
            ],200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->Json([
                'message' => 'Colaborador não deletado',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
