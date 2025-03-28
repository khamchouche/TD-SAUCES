<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sauce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SauceApiController extends Controller
{
// Liste toutes les sauces
public function index()
{
return response()->json(Sauce::all(), 200);
}

// Affiche une sauce spécifique
public function show(Sauce $sauce)
{
return response()->json($sauce, 200);
}

// Ajoute une sauce (protégé par authentification)
public function store(Request $request)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
'manufacturer' => 'required|string|max:255',
'description' => 'required|string',
'mainPepper' => 'required|string',
'imageUrl' => 'required|url',
'heat' => 'required|integer|min:1|max:10',
]);

$validated['userId'] = Auth::id();

$sauce = Sauce::create($validated);

return response()->json($sauce, 201);
}

// Modifie une sauce (protégé par authentification)
public function update(Request $request, Sauce $sauce)
{
if (Auth::id() !== $sauce->userId) {
return response()->json(['error' => 'Non autorisé'], 403);
}

$validated = $request->validate([
'name' => 'sometimes|string|max:255',
'manufacturer' => 'sometimes|string|max:255',
'description' => 'sometimes|string',
'mainPepper' => 'sometimes|string',
'imageUrl' => 'sometimes|url',
'heat' => 'sometimes|integer|min:1|max:10',
]);

$sauce->update($validated);

return response()->json($sauce, 200);
}

// Supprime une sauce (protégé par authentification)
public function destroy(Sauce $sauce)
{
if (Auth::id() !== $sauce->userId) {
return response()->json(['error' => 'Non autorisé'], 403);
}

$sauce->delete();

return response()->json(['message' => 'Sauce supprimée'], 200);
}
}
