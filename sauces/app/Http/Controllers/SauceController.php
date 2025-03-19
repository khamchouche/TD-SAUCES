<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Auth;

use App\Models\Sauce;
use Illuminate\Http\Request;

class SauceController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all(); // Récupère toutes les sauces
        return view('sauces.index', compact('sauces')); // Envoie les sauces à la vue
    }

public function create() {
    return view('sauces.create');
}

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string',
            'imageUrl' => 'required|url',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        $validated['userId'] = Auth::id();
        Sauce::create($validated);
        return redirect()->route('sauces.index');
}

public function show(Sauce $sauce) {
return view('sauces.show', compact('sauce'));
}

public function edit(Sauce $sauce) {
return view('sauces.edit', compact('sauce'));
}

public function update(Request $request, Sauce $sauce) {
$validated = $request->validate([
'name' => 'required|string|max:255',
'manufacturer' => 'required|string|max:255',
'description' => 'required|string',
'mainPepper' => 'required|string',
'imageUrl' => 'required|url',
'heat' => 'required|integer|min:1|max:10',
]);

$sauce->update($validated);
return redirect()->route('sauces.index');
}

public function destroy(Sauce $sauce) {
$sauce->delete();
return redirect()->route('sauces.index');
}
}
