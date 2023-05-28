# Project Name: " Recipe Book"

Description:
The "Recipe Book" project allows users to create, store, view, update, and delete recipes. Users can add their favorite recipes, including the ingredients and instructions, and manage them easily.

# Features:

User Registration and Login: Allow users to create an account and log in to the application.
Recipe Management:
Create Recipe: Users can add a new recipe with a title, description, list of ingredients, and step-by-step instructions.
View Recipe: Users can view a list of their recipes and click on each recipe to see the full details.
Update Recipe: Users can edit and update existing recipes, including changing the title, description, ingredients, and instructions.
Delete Recipe: Users can delete unwanted recipes from their collection.
Search and Filter: Implement a search functionality to allow users to search for recipes by title or ingredients. Additionally, provide filters to sort recipes by categories or tags.
Categories and Tags: Allow users to categorize recipes into different categories (e.g., appetizers, main dishes, desserts) and add tags to make it easier to organize and find recipes.
Image Upload: Enable users to upload an image for each recipe to make it visually appealing.
User Profile: Create a user profile page where users can update their personal information and view their saved recipes.
Favorites and Likes: Allow users to mark recipes as favorites or like them to keep track of their preferred recipes.
Share and Print: Implement sharing options for users to share their recipes on social media platforms. Also, provide a print-friendly version of each recipe.
Commenting System: Add a commenting system to allow users to leave comments on recipes, share their cooking experiences, or ask questions.
By implementing this project, you will learn about Laravel's basic CRUD operations, user authentication, form validation, database migrations, relationships (e.g., one-to-many for categories and tags), image uploading, search functionality, and more.

Remember to plan and organize your project structure, create appropriate database tables, define routes, and design user-friendly views for each feature. Happy coding!

# Step By Step Guide

Step 1: Set up Laravel
1. Install Laravel by following the official documentation: https://laravel.com/docs/installation
2. Create a new Laravel project using the Laravel installer: `laravel new recipe-book`

Step 2: Set up the Database
1. Open the `.env` file in the root of your project and configure your database connection details (database name, username, password).
2. Create a new database for your project in your database management system.

Step 3: Create the Recipe Migration
1. Run the following command to create a migration for the `recipes` table: `php artisan make:migration create_recipes_table --create=recipes`
2. Open the generated migration file in the `database/migrations` directory and define the table schema as follows:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('ingredients');
            $table->text('instructions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
```

3. Run the migration to create the `recipes` table in the database: `php artisan migrate`

Step 4: Create the Recipe Model
1. Run the following command to create a `Recipe` model: `php artisan make:model Recipe`

```php
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title', 'description', 'ingredients', 'instructions',
    ];
}
```

Step 5: Create Routes and Controller
1. Open the `routes/web.php` file and define the routes for your application as follows:

```php
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
```

2. Create a new controller named `RecipeController` by running the command: `php artisan make:controller RecipeController`

```php
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->paginate(10);
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        Recipe::create($request->all());

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe created successfully.');
    }

    public function show(Recipe $recipe

)
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
```

Step 6: Create Views
1. Create the following view files in the `resources/views/recipes` directory:

- `index.blade.php`: Displays a list of all recipes.
- `create.blade.php`: Form to create a new recipe.
- `edit.blade.php`: Form to edit an existing recipe.
- `show.blade.php`: Displays the details of a specific recipe.

2. Below is an example of the `create.blade.php` view file:

```html
<!-- resources/views/recipes/create.blade.php -->
<form action="{{ route('recipes.store') }}" method="POST">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Description</label>
    <textarea name="description" id="description" required></textarea>

    <label for="ingredients">Ingredients</label>
    <textarea name="ingredients" id="ingredients" required></textarea>

    <label for="instructions">Instructions</label>
    <textarea name="instructions" id="instructions" required></textarea>

    <button type="submit">Create Recipe</button>
</form>
```

Step 7: Test the Application
1. Start the development server by running the command: `php artisan serve`
2. Visit `http://localhost:8000` in your web browser to see the list of recipes.
3. Use the navigation links to create, edit, and delete recipes.

That's it! You have created a simple Recipe Book CRUD application using Laravel. You can continue enhancing the project by adding additional features like search, categories, image upload, favorites, and more.
