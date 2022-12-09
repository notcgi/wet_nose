<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Collection;

class NewsService
{
    /**
     * @return News[]|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function list(int $category_id = null, string $order = 'desc'): \Illuminate\Pagination\LengthAwarePaginator|array
    {
        $news = News::orderBy('created_at', $order);
        $news = $news->where('is_active', true);
        if ($category_id)
            $news = $news->where('category_id', $category_id);
        return $news->paginate(3);
    }

    public function store(array|Collection$data): void
    {
        $news = new News();
        $news->fill($data);
        $news->save();
    }

    public function update(News $news, array|Collection $data): void
    {
        $news->fill($data);
        $news->save();
    }

    public function destroy(News $news): void
    {
        $news->delete();
    }
}
