<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Adresse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    public function index(): JsonResponse
    {
        $adresses = Adresse::with(['nature', 'categorie'])->get();
        return response()->json($adresses);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'description_adresse' => 'required|string|max:255',
            'gps_latitude'        => 'required|numeric',
            'gps_longitude'       => 'required|numeric',
            'gps_altitude'        => 'nullable|numeric',
            'code_nature'         => 'required|exists:nature_adresses,code_nature',
            'code_categorie'      => 'required|exists:categorie_adresses,code_categorie',
        ]);

        $adresse = Adresse::create($validated);
        $adresse->load(['nature', 'categorie']);

        return response()->json($adresse, 201);
    }

    public function show($id): JsonResponse
    {
        $adresse = Adresse::with(['nature', 'categorie'])->findOrFail($id);
        return response()->json($adresse);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $adresse = Adresse::findOrFail($id);

        $validated = $request->validate([
            'description_adresse' => 'required|string|max:255',
            'gps_latitude'        => 'required|numeric',
            'gps_longitude'       => 'required|numeric',
            'gps_altitude'        => 'nullable|numeric',
            'code_nature'         => 'required|exists:nature_adresses,code_nature',
            'code_categorie'      => 'required|exists:categorie_adresses,code_categorie',
        ]);

        $adresse->update($validated);
        $adresse->load(['nature', 'categorie']);

        return response()->json($adresse);
    }

    public function destroy($id): JsonResponse
    {
        $adresse = Adresse::findOrFail($id);
        $adresse->delete();
        return response()->json(null, 204);
    }
}
