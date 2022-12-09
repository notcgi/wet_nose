<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    public function __construct(
        private CategoryService $categories
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     */
    public function store(CategoryRequest $request)
    {
        $this->categories->store($request->validated());
        return redirect(route('category.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     */
    public function edit(Category $category)
    {
        return view('categories.create',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->categories->update($category, $request->validated());
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     */
    public function destroy(Category $category)
    {
        $this->categories->destroy($category);
        return redirect(route('category.index'));
    }
}
