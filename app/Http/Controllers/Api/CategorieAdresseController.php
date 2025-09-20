<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategorieAdresse;
use Illuminate\Http\Request;

class CategorieAdresseController extends Controller
{

    public function index()
    {
        $categories = CategorieAdresse::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code_categorie'    => 'required|string|max:10|unique:categorie_adresses',
            'libelle_categorie' => 'required|string|max:255',
        ]);

        $categorie = CategorieAdresse::create($validated);
        return response()->json($categorie, 201);
    }

    public function show(string $id)
    {
        $categorie = CategorieAdresse::findOrFail($id);
        return response()->json($categorie);
    }

    public function update(Request $request, string $id)
    {
        $categorie = CategorieAdresse::findOrFail($id);

        $validated = $request->validate([
            'libelle_categorie' => 'required|string|max:255',
        ]);

        $categorie->update($validated);
        return response()->json($categorie);
    }

    public function destroy(string $id)
    {
        $categorie = CategorieAdresse::findOrFail($id);
        $categorie->delete();
        return response()->json(null, 204);
    }
}
