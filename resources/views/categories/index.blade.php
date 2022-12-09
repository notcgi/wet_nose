@extends('layouts.app')
@section('content')
    <a href="{{ route('category.create') }}" role="button" class="btn btn-outline-success">Create</a>
    <table class="table dark:table-dark text-gray-600 dark:text-gray-400">
        <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Parent</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        @php
            /** @var \App\Models\Category[] $categories */
        @endphp
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_id }}</td>
                <td style="width: inherit"><a href="{{route('category.edit', ['category'=>$category])}}" role="button" class="btn btn-outline-primary">Edit</a></td>
                <td style="width: inherit">
                    <form action="{{route('category.destroy', ['category'=>$category])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit"  value="Delete" name="Delete" id="btnExc"
                               class="btn btn-outline-danger glyphicon glyphicon-trash"/>

                    </form></td>
            </tr>
        @endforeach
    </table>
    {{ $categories->links() }}
@endsection
