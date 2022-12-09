@php
/** @var \App\Models\News[]|\Illuminate\Support\Collection $news */
@endphp
@extends('layouts.app')
@section('content')
    <ul>
        @foreach($categories as $category)
            @include('layouts.menu_item', ['category' => $category])
        @endforeach
    </ul>
    @foreach($news as $news_item)
        <a role="heading" href="{{route('news.show',['news'=>$news_item])}}">
            <h4>{{$news_item->title}}</h4>
            <p>{{$news_item->announce}}</p>
        </a>
    @endforeach
    {{ $news->links() }}
@endsection
