@php
    /** @var \App\Models\News $news */
@endphp
@extends('layouts.app')
@section('content')
    <form
        action="@isset($news){{route('news.update', ['news'=>$news])}}@else{{route('news.store')}}@endif"
        method="post">
        @isset($news)
            @method('PUT')
        @endif
        @csrf
        <div class="mb-3">
            <input
                class="form-control @error('title') is-invalid @enderror"
                type="text"
                name="title"
                @isset($news)
                    value="{{$news->title}}"
                @endif
                placeholder="Title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input
                class="form-control @error('announce') is-invalid @enderror"
                type="text"
                name="announce"
                @isset($news)
                    value="{{$news->announce}}"
                @endif
                placeholder="Announce">
            @error('announce')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input
                class="form-control @error('text') is-invalid @enderror"
                type="text"
                name="text"
                @isset($news)
                    value="{{$news->text}}"
                @endif
                placeholder="Text">
            @error('text')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input
                class="form-control @error('category_id') is-invalid @enderror"
                type="text"
                name="category_id"
                @isset($news)
                    value="{{$news->category_id}}"
                @endif
                placeholder="Category Id">
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input name="is_active" class="form-check-input @error('is_active') is-invalid @enderror" id="chkIsActive" type="checkbox" value="1" @if(!isset($news) or $news->is_active) checked @endif>
                <label class="form-check-label" for="chkIsActive">
                    Is Active
                </label>
            </div>
            @error('is_active')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button
            class="btn btn-outline-primary"
            type="submit">Create
        </button>
    </form>
@endsection
