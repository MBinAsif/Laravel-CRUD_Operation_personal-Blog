<!-- resources/views/recipes/edit.blade.php -->

<head>
    <style>
    
        
        body {
            background-color: #f06292; /* Funky pink background color */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    
        .container {
            
            width: 900px;
        }
        
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
    
        .form-container h2 {
            color: #f06292;
            margin-bottom: 20px;
        }
    
        .form-group {
            margin-bottom: 20px;
        }
    
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
    
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #f06292;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    
        button[type="submit"]:hover {
            background-color: #e91e63; /* Darker pink on hover */
        }
    </style>
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
    <h1>Edit Recipe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $recipe->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $recipe->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" id="ingredients" class="form-control" required>{{ $recipe->ingredients }}</textarea>
        </div>

        <div class="form-group">
            <label for="instructions">Instructions</label>
            <textarea name="instructions" id="instructions" class="form-control" required>{{ $recipe->instructions }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>
@endsection
