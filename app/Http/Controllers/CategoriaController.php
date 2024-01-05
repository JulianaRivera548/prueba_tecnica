<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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

   
}
