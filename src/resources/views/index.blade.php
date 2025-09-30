@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="item-list__content">
    <div class="item-list__select-tab__content">
        <a href="/" class="item-list__recommend-tab">おすすめ</a>
        <a href="/?tab=mylist" class="item-list__like-tab">マイリスト</a>
    </div>
    <div class="item-list__inner">
        @foreach ($items as $item)
            {{-- @if ($sold->soldItems->isEmpty()) --}}
                <a href="/item/{{ $item->id }}" class="item-detail__link">
                    <div class="item-card">
                        <div class="item-image__content">
                            <img src="{{ asset($item->image_path) }}" alt="商品画像" class="item-image">
                        </div>
                        <span class="item-name">{{ $item->name }}</span>
                    </div>
                </a>
            {{-- @endif --}}
        @endforeach
    </div>
</div>
@endsection