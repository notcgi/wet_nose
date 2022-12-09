@extends('layouts.app')
@section('content')
    <form
        action="@isset($category){{route('category.update', ['category'=>$category])}}@else{{route('category.store')}}@endif"
        method="post">
        @isset($category)
            @method('PUT')
        @endif
        @csrf
        <div class="mb-3">
        <input
            class="form-control @error('name') is-invalid @enderror"
            type="text"
            name="name"
            @isset($category)
                value="{{$category->name}}"
            @endif
            placeholder="Name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input
                class="form-control @error('parent_id') is-invalid @enderror"
                type="text"
                name="parent_id"
                @isset($category)
                    value="{{$category->parent_id}}"
                @endif
                placeholder="Parent Id">
            @error('parent_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button
            class="btn btn-outline-primary"
            type="submit">Create
        </button>
    </form>
@endsection
