<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $title = 'Added Categories';
        $parentId = null;
        return view('categories.index', compact('categories', 'title', 'parentId'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
      
            $request->validate([
                'name'        => 'required|string|max:255',
                'slug'        => 'required|string|max:255|unique:categories,slug',
                'description' => 'nullable|string',
                'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // for image save
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('categories', 'public');
            }

            // category create
            Category::create([
                'name'        => $request->name,
                'slug'        => $request->slug,
                'description' => $request->description,
                'image'       => $imagePath,
                'parent_id'   => $request->parent_id,
            ]);

            if($request->parent_id)
                return redirect()
                    ->route('categories.show', $request->parent_id)
                    ->with('success', 'Subcategory Created Successfully!');
            else
                return redirect()
                    ->route('categories.index')
                    ->with('success', 'Category Created Successfully!');
        }

        public function show(Category $category)
        {
            $categories = Category::where('parent_id', $category->id)->get();
            $title = 'Added Sub Categories';
            $parentId = $category->id;
            return view('categories.index', compact('categories', 'title', 'parentId'));
        }

        public function edit(Category $category,){
            $categories = Category::whereNull('parent_id')->get();
            return view('categories.edit', compact('category', 'categories'));
        }
        public function update(Request $request, Category $category){
            $request->validate([
                'name'        => 'required|string|max:255',
                'slug'        => 'required|string|max:255|unique:categories,slug,'.$category->id,
                'description' => 'nullable|string',
                'image'       => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // for image update
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('categories', 'public');
                $category->image = $imagePath;
            }

            // category update
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->save();

            return redirect()
                ->route('categories.index')
                ->with('success', 'Category Updated Successfully!');
        }
        public function destroy(Category $category)
        {
            // Delete the category
            $category->delete();

            return redirect()
                ->route('categories.index')
                ->with('success', 'Category Deleted Successfully!');
        }
}
