<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::all();
        return view('admincp.category.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->slug = $data['slug'];
        $category->save();
        return redirect()->route('category.create')->with('success', 'Category created successfully!');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $list = Category::all();
        return view('admincp.category.form', compact('list', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->slug = $data['slug'];
        $category->save();
        return redirect()->route('category.edit', $id)->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route('category.create')->with('success', 'Category deleted successfully!');
    }
}
