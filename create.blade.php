<head>
    <style>
    
    main {
        background-color: #f06292;
    }
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
        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 style="font-family: jockey-one">Create Recipe</h2>

            <div class="form-group">
                <label for="title" style="font-family: jockey-one; font-size: 16px">Title</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="description" style="font-family: jockey-one; font-size: 16px">Description</label>
                <textarea name="description" id="description" style="height: 100px" required></textarea>
            </div>

            <div class="form-group">
                <label for="ingredients" style="font-family: jockey-one; font-size: 16px">Ingredients</label>
                <textarea name="ingredients" id="ingredients" style="height: 100px" required></textarea>
            </div>

            <div class="form-group">
                <label for="instructions" style="font-family: jockey-one; font-size: 16px">Instructions</label>
                <textarea name="instructions" id="instructions" style="height: 100px" required></textarea>
            </div>

            

            <button type="submit" style="font-family: jockey-one; font-size: 22px">Create Recipe</button>
        </form>
    </div>
</div>

@endsection
