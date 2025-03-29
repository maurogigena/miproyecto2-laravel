<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //muestra la lista de categorias
    {
        $categories = Category::all(); 
 
        return view('categories.index', compact('categories'));; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //muestra el form de creacion
    {
        return view('categories.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // guarda los registros en la DB
    {
        Category::create([
            'name' => $request->input('name'),
        ]);
 
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) // muestra los registros individuales
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) // muestra el form de edicion
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) //actualiza los datos en la DB
    {
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) //elimina un registro
    {
        $category->delete();
 
        return redirect()->route('categories.index');
    }
}
