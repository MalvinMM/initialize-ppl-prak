<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('landing', ['recipes' => $recipes]);
    }
    
    public function show($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        // $ingredients = explode(',', $recipe->ingredients);
        return view('show-recipe', ['recipe' => $recipe]);
    }


    public function addRecipe()
    {
        return view('add-recipe');
    }

    public function storeRecipe(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'required',
        ]);

        $recipe = new Recipe();
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = explode("\n", $request->instructions);

        $name = Str::random(10) . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $name);

        $recipe->image = $name;
        $recipe->save();
        return redirect()->route('landing');
    }


    public function editRecipe($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        return view('edit-recipe', ['recipe' => $recipe]);
    }

    public function updateRecipe($id, Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $recipe = Recipe::where('id', $id)->first();
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = explode("\n", $request->instructions);
        if ($request->image) {
            $name = Str::random(10) . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $name);
            File::delete(public_path("images/" . $recipe->image));
            $recipe->image = $name;
        }
        $recipe->save();
        return redirect()->route('landing');
    }

    public function deleteRecipe($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        File::delete(public_path("images/" . $recipe->image));
        $recipe->delete();
        return redirect()->route('landing');
    }
}
