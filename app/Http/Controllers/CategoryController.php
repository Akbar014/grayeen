<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

// use Intervention\Image\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        if ($request->hasFile('image')) {
              $value = $request->file('image');
    $imageName = time().$value->getClientOriginalName();

    $destinationPath = 'images/';
    $image = Image::make($value);
    $image->resize(1300, 530);
    $image->save($destinationPath.$imageName);
            
        } else {
            $category = new Category;
            $category->cname = $request->cname;
            $category->save();

            return back()->with('message', 'Category Created successfully.');
        }

        $category = new Category;
        $category->cname = $request->cname;
        $category->image = $imageName;
        $category->save();

        return back()->with('message', 'Category Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $value = $request->file('image');
            $imageName = time().$value->getClientOriginalName();
            $destinationPath = 'images/';
            $image = Image::make($value);
            $image->resize(1300, 530);
            $image->save($destinationPath.$imageName);
            $category->image = $imageName;
        }
                
        $category->cname = $request->input('cname');
        $category->save();

        return redirect()->back()->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::find($id);
        // dd($category);
        if ($category->image) {
            unlink('images/'.$category->image);
        }

        $category->delete();

        return back()->with('delete', 'Category deleted successfully.');
    }
}
