<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;

class ApiSeccionController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        return response()->json($categorias);
    }

    public function show($id)
    {
        $categoria = Category::findOrFail($id);
        return response()->json($categoria);
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',


        ]);

     
    $categoria = new Category([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'parent_id' => $request->input('parent_id'),
        'order' => $request->input('order'),
        'slug' => Str::slug($request->input('name')), 
        
    ]);

      
        $categoria->save();

        
        return response()->json($categoria, 201);
    }
}
