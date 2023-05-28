<!-- resources/views/recipes/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Recipe Details</h1>

    <h2>Title: {{ $recipe->title }}</h2>
    <p>Description: {{ $recipe->description }}</p>
    <p>Ingredients: {{ $recipe->ingredients }}</p>
    <p>Instructions: {{ $recipe->instructions }}</p>

    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</button>
    </form>
@endsection
