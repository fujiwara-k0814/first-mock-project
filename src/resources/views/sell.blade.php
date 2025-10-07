@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
    <div class="sell__heading">
        <h1 class="sell__title">商品の出品</h1>
    </div>
    <div class="sell-image__content">
        <div class="sell-image__label-content">
            <span class="sell-image__label">商品画像</span>
        </div>
        <div class="sell-image__inner">
            @php
                $itemImage = session('item_image')
            @endphp
            <img src="{{ asset('storage/' . $itemImage) }}" alt="商品画像" class="sell-image">
        </div>
        <form action="/sell/image" method="post" class="sell-image-form" enctype="multipart/form-data">
            @csrf
            <label for="sell-image-select" class="sell-image__label">
                <input type="file" name="image" id="sell-image-select" class="sell-image__select" onchange="this.form.submit()">
                画像を選択する
            </label>
        </form>
    </div>
    <form action="/sell" method="post" class="sell-information-form">
        @csrf
        <div class="sell-detail__content">
            <div class="sell-detail__heading">
                <h2 class="sell-detail__title">商品の詳細</h2>
            </div>
            <div class="sell-detail__category">
                <div class="sell-category__label-content">
                    <span class="sell-category__label">カテゴリー</span>
                </div>
                <div class="sell-category__content">
                    @foreach ($categories as $category)
                        <label for="category-{{ $category->id }}" class="category-label">
                            <input type="checkbox" name="category[]" id="category-{{ $category->id }}" class="category-type" value="{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="sell-detail__condition">
                <div class="sell-condition__label-content">
                    <span class="sell-condition__label">商品の状態</span>
                </div>
                <div class="sell-condition__select__content">
                    <select name="condition" class="select-condition">
                        <option value="" hidden>選択してください</option>
                        @foreach ($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="sell-discription__content">
            <div class="sell-discription__heading">
                <h2 class="sell-discription__title">商品名と説明</h2>
            </div>
            <div class="sell-discription__name">
                <div class="sell-name__label-content">
                    <span class="sell-name__label">商品名</span>
                </div>
                <div class="sell-name__content">
                    <input type="text" name="name" class="sell-name">
                </div>
            </div>
            <div class="sell-discription__brand">
                <div class="sell-brand__label-content">
                    <span class="sell-brand__label">ブランド名</span>
                </div>
                <div class="sell-brand__content">
                    <input type="text" name="brand" class="sell-brand">
                </div>
            </div>
            <div class="sell-discription">
                <div class="sell-discription__label-content">
                    <span class="sell-discription__label">商品の説明</span>
                </div>
                <div class="sell-discription__content">
                    <textarea name="discription" class="sell-discription"></textarea>
                </div>
            </div>
            <div class="sell-discription__price">
                <div class="sell-price__label-content">
                    <span class="sell-price__label">販売価格</span>
                </div>
                <div class="sell-price__content">
                    <input type="number" name="price" class="sell-price">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection