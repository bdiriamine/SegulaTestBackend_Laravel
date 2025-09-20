<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NatureAdresse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NatureAdresseController extends Controller
{

    public function index(): JsonResponse
    {

        $natures = NatureAdresse::all();
        return response()->json($natures);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code_nature'    => 'required|string|max:10|unique:nature_adresses',
            'libelle_nature' => 'required|string|max:255',
        ]);

        $nature = NatureAdresse::create($validated);
        return response()->json($nature, 201);
    }

    public function show(string $id): JsonResponse
    {
        $nature = NatureAdresse::findOrFail($id);
        return response()->json($nature);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $nature = NatureAdresse::findOrFail($id);

        $validated = $request->validate([
            'libelle_nature' => 'required|string|max:255',
        ]);

        $nature->update($validated);
        return response()->json($nature);
    }

    public function destroy(string $id): JsonResponse
    {
        $nature = NatureAdresse::findOrFail($id);
        $nature->delete();
        return response()->json(null, 204);
    }
}
