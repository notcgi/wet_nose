@extends('layouts.app')
@section('content')
    <a href="{{ route('news.create') }}" role="button" class="btn btn-outline-success">Create</a>
    <table class="table dark:table-dark text-gray-600 dark:text-gray-400">
        <thead>
        <tr>
            <td>Id</td>
            <td>Category</td>
            <td>Title</td>
            <td>Announce</td>
            <td>Text</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        @php
            /** @var \App\Models\News[] $news */
        @endphp
        @foreach($news as $news_item)
            <tr>
                <td>{{ $news_item->id }}</td>
                <td>{{ $news_item->category->name }}</td>
                <td>{{ $news_item->title }}</td>
                <td>{{ $news_item->announce }}</td>
                <td>{{ $news_item->text }}</td>
                <td style="width: inherit"><a href="{{route('news.edit', ['news'=>$news_item])}}" role="button" class="btn btn-outline-primary">Edit</a></td>
                <td style="width: inherit">
                    <form action="{{route('news.destroy', ['news'=>$news_item])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit"  value="Delete" name="Delete" id="btnExc"
                               class="btn btn-outline-danger glyphicon glyphicon-trash"/>

                    </form></td>
            </tr>
        @endforeach
    </table>
    {{ $news->links() }}
@endsection
