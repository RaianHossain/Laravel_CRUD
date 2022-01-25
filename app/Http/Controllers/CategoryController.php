<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        // dd($categories);
        return view('backend.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {

        try {
            // $request->validate([
            //     'title' => 'required|min:3|max:50|unique:categories,title',
            //     // 'title' => ['required', 'min:3', Rule::unique('categories', 'title')],
            //     'description' => ['required', 'min:10'],
            // ]);
            // $imageName = request()->file('image')->store('storage/app/public/images');
            // dd($imageName);
            Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('categories.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    // public function show(Category $id)
    public function show(Category $category)
    {
        // $category = Category::where('id', $id)->firstOrFail();
        // $category = Category::find($id);
        return view('backend.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            // $request->validate([
            //     // 'title' => 'required|min:3|max:50|unique:categories,title,'.$category->id,
            //     'title' => ['required', 'min:3', 
            //         Rule::unique('categories', 'title')->ignore($category->id)
            //     ],
            //     'description' => ['required', 'min:10'],
            // ]);

            $category->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('categories.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }
}
