<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
{
    // Fetch all the recipes from the database
    $recipes = Recipe::all();

    // Pass the recipes to the index view
    return view('recipes.index', compact('recipes'));
}

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'ingredients' => 'required',
        'instructions' => 'required',
    ]);

    // Create a new recipe with the validated data
    $recipe = Recipe::create($validatedData);

    // Redirect to the index page with a success message
    return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
}

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        $recipe->update($request->all());

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully.');
    }
}
