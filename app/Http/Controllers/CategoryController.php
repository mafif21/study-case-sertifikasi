<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('query')) {
            $query = $request->input('query');
            $categories = Category::where('name', 'LIKE', "%$query%")->get();
        } else {
            $categories = Category::all();
        }


        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:30|unique:categories',
        ]);

        Category::create([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Berhasil menambahkan kategori baru');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:30|unique:categories,name,' . $category->id
        ]);


        $category->update([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('admin.category.index')->with('edit', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            Category::destroy($category->id);
            return to_route('admin.category.index')->with('delete', 'Kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1451) {
                return redirect()->route('admin.category.index')->with('delete', 'Kategori ' . $category->name . ' masih dibutuhkan');
            } else {
                return redirect()->route('admin.category.index')->with('delete', 'Kategori tidak ditemukan');
            }
        }
    }
}
