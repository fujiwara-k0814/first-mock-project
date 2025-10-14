@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="item-list__content">
    <div class="item-list__select-tab__content">
        <a href="{{ request('keyword') ? '/' . '?' . http_build_query(['keyword' => request('keyword')]) : '/' }}" class="item-list__recommend-tab">おすすめ</a>
        <a href="{{ '/' . '?' . http_build_query(array_merge(['tab' => 'mylist'], request()->query())) }}" class="item-list__like-tab">マイリスト</a>
    </div>
    <div class="item-list__inner">
        @foreach ($items as $item)
            <a href="/item/{{ $item->id }}" class="item-detail__link">
                <div class="item-card">
                    <div class="item-image__content">
                        @if ($item->delivery_address)
                            <div class="sold-label__wrapper">
                                <div class="sold-label__content">
                                    <span class="sold-label">sold</span>
                                </div>
                                <img src="{{ asset($item->image_path) }}" alt="商品画像" class="item-image">
                            </div>
                        @else
                            <img src="{{ asset($item->image_path) }}" alt="商品画像" class="item-image">
                        @endif
                    </div>
                    <span class="item-name">{{ $item->name }}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection