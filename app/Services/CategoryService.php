<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryService
{
    public function menuList(): array|Collection
    {
        return Category::with('children')
            ->whereNull('parent_id')
            ->get();
    }
    public function store(array|Collection$data): void
    {
        $category = new Category();
        $category->fill($data);
        $category->save();
    }

    public function update(Category $category, array|Collection $data): void
    {
        $category->fill($data);
        $category->save();
    }

    public function destroy(Category $category): void
    {
        $category->delete();
    }
}
