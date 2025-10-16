@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
    <div class="sell__heading">
        <h1 class="sell__title">商品の出品</h1>
    </div>
    <form action="/sell" method="post" class="sell-form" enctype="multipart/form-data">
        @csrf
        <div class="sell-image__content">
            <div class="sell-image__label-content">
                <span class="sell-image__label">商品画像</span>
            </div>
            <div class="sell-image__inner">
                @if (session('item_image_path'))
                    <img src="{{ asset(session('item_image_path')) }}" alt="商品画像" class="sell-image">
                @endif
                <div class="sell-select-label__wrapper">
                    <label for="sell-image-select" class="sell-select__label">
                        <input type="file" name="image_path" id="sell-image-select" class="sell-image__select" onchange="this.form.submit()">
                        画像を選択する
                    </label>
                </div>
            </div>
            <div class="sell-form__error">
                @error('image_path')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="sell-item__detail-content">
            <div class="sell-detail__heading">
                <h2 class="sell-detail__title">商品の詳細</h2>
            </div>
            <div class="sell-detail__category">
                <div class="sell-category__label-content">
                    <span class="sell-category__label">カテゴリー</span>
                </div>
                <div class="sell-category__content">
                    @foreach ($categories as $category)
                        <input type="checkbox" name="category[]" id="category-{{ $category->id }}" class="category-type" value="{{ $category->id }}"{{ in_array($category->id, old('category', [])) ? 'checked' : '' }}>
                        <label for="category-{{ $category->id }}" class="category-label">
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
                <div class="sell-form__error">
                    @error('category')
                        {{ $message }}
                    @enderror
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
                            <option class="condition-option" value="{{ $condition->id }}"{{ old('condition') == $condition->id ? 'selected' : '' }}>{{ $condition->name }}</option>
                        @endforeach
                    </select>
                    <div class="sell-form__error">
                        @error('condition')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="sell-item__description-content">
            <div class="sell-description__heading">
                <h2 class="sell-description__title">商品名と説明</h2>
            </div>
            <div class="sell-description__name">
                <div class="sell-name__label-content">
                    <span class="sell-name__label">商品名</span>
                </div>
                <div class="sell-name__content">
                    <input type="text" name="name" class="sell-name" value="{{ old('name') }}">
                </div>
                <div class="sell-form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="sell-description__brand">
                <div class="sell-brand__label-content">
                    <span class="sell-brand__label">ブランド名</span>
                </div>
                <div class="sell-brand__content">
                    <input type="text" name="brand" class="sell-brand" value="{{ old('brand') }}">
                </div>
            </div>
            <div class="sell-item-description">
                <div class="sell-description__label-content">
                    <span class="sell-description__label">商品の説明</span>
                </div>
                <div class="sell-description__content">
                    <textarea name="description" class="sell-description">{{ old('description') }}</textarea>
                </div>
                <div class="sell-form__error">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="sell-description__price">
                <div class="sell-price__label-content">
                    <span class="sell-price__label">販売価格</span>
                </div>
                <div class="sell-price__content">
                    <span class="yen-mark">¥</span>
                    <input type="text" name="price" class="sell-price" value="{{ old('price') }}">
                </div>
                <div class="sell-form__error">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <input type="hidden" name="image_path" value="{{ session('item_image_path') }}">
        <button type="submit" class="sell-form__button" name="action" value="save">出品する</button>
    </form>
</div>
@endsection