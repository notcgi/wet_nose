@php
    /** @var \App\Models\Category $category */
@endphp
@if($category->children->count()>0)
    <li>
        <a href="{{$category->getLink()}}">{{$category->name}}</a>
        <ul class="">
            @foreach($category->children as $child)
                @include('layouts.menu_item',['category'=>$child])
            @endforeach
        </ul>
    </li>
@else

    <li>
        <a href="{{$category->getLink()}}">{{$category->name}}</a>
    </li>
@endif
