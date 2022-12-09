<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\NewsService;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function __construct(
        private NewsService $news,
        private CategoryService $categories,
    ) {}
    public function index()
    {
        return view('index', [
            'news' => $this->news->list(request('category_id'), request('order','asc')),
            'categories' => $this->categories->menuList()
            ]);
    }
}
