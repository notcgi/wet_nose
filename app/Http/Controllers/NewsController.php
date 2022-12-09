<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\NewsService;

class NewsController extends Controller
{

    public function __construct(
        private NewsService $news
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::paginate();
        return view('news.index',compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     */
    public function store(NewsRequest $request)
    {
        $this->news->store($request->validated());
        return redirect(route('news.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     */
    public function edit(News $news)
    {
        return view('news.create',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param News $news
     */
    public function update(NewsRequest $request, News $news)
    {
        $this->news->update($news, $request->validated());
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     */
    public function destroy(News $news)
    {
        $this->news->destroy($news);
        return redirect(route('news.index'));
    }
}
