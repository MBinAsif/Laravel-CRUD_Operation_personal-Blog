<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        $latestRecipes = Recipe::latest()->take(5)->get();
        $newRecipes = Recipe::orderBy('created_at', 'desc')->take(5)->get();

        return view('home', compact('latestRecipes', 'newRecipes'));
    }
}
