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
                <img src="{{ asset(session('item_image')) }}" alt="商品画像" class="sell-image">
            </div>
            <label for="sell-image-select" class="sell-image__label">
                <input type="file" name="image" id="sell-image-select" class="sell-image__select" onchange="this.form.submit()">
                画像を選択する
            </label>
            <div class="sell-image-form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
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
                            <input type="checkbox" name="category[]" id="category-{{ $category->id }}" class="category-type" value="{{ $category->id }}"{{ in_array($category->id, old('category', [])) ? 'checked' : '' }}>
                            {{ $category->name }}
                        </label>
                    @endforeach
                    <div class="sell-form__error">
                        @error('category')
                            {{ $message }}
                        @enderror
                    </div>
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
                            <option value="{{ $condition->id }}"{{ old('condition') == $condition->id ? 'selected' : '' }}>{{ $condition->name }}</option>
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
        <div class="sell-discription__content">
            <div class="sell-discription__heading">
                <h2 class="sell-discription__title">商品名と説明</h2>
            </div>
            <div class="sell-discription__name">
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
            <div class="sell-discription__brand">
                <div class="sell-brand__label-content">
                    <span class="sell-brand__label">ブランド名</span>
                </div>
                <div class="sell-brand__content">
                    <input type="text" name="brand" class="sell-brand" value="{{ old('brand') }}">
                </div>
            </div>
            <div class="sell-discription">
                <div class="sell-discription__label-content">
                    <span class="sell-discription__label">商品の説明</span>
                </div>
                <div class="sell-discription__content">
                    <textarea name="description" class="sell-discription">{{ old('description') }}</textarea>
                </div>
                <div class="sell-form__error">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="sell-discription__price">
                <div class="sell-price__label-content">
                    <span class="sell-price__label">販売価格</span>
                </div>
                <div class="sell-price__content">
                    <input type="text" name="price" class="sell-price" value="{{ old('price') }}">
                </div>
                <div class="sell-form__error">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <input type="hidden" name="image" value="{{ old('image', session('item_image')) }}">
        <button type="submit" class="sell-form__button" name="action" value="save">出品する</button>
    </form>
</div>
@endsection