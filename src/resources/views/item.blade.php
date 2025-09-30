@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
    <div class="item-detail__contet">
        <div class="item-image__content">
            <img src="{{ asset($item->image_path) }}" alt="商品画像" class="item-image">
        </div>
        <div class="item-detaile-information__content">
            <h1 class="item-name">{{ $item->name }}</h1>
            <span class="item-brand">{{ $item->brand }}</span>
            <strong class="item-price">{{ $item->price }} (税込)</strong>
            <div class="item-icon__wrapper">
                <div class="item-like__content">
                    <img src="/images/star_icon.svg" alt="いいね画像" class="item__like-icon">
                    <span class="item__likes-count">{{ $item->likes_count }}</span>
                </div>
                <div class="item-comment__content">
                    <img src="/images/speech_balloon_icon.svg" alt="コメント画像" class="item__comment-icon">
                    <span class="item__comment-count">{{ $item->comments_count }}</span>
                </div>
            </div>
            <button type="submit" class="item__purchase-button">購入手続きへ</button>
            <h2 class="item-description__title">商品説明</h2>
            <span class="item-description__text"></span>
            <h2 class="item-information__title">商品の情報</h2>
            <h3 class="item-category__title">カテゴリー</h3>
            <div class="item-category__content">
                @foreach ($item->categories as $category)
                    <span class="item-category">{{ $category->name }}</span>
                @endforeach
            </div>
            <h3 class="item-condition__title">商品の状態</h3>
            <span class="item-condition">{{ $item->condition_label }}</span>
            <h2 class="item-comment__title">コメント({{$item->comments_count}})</h2>
            <img src="" alt="プロフィール画像">
            <h3 class="item-comment__user-name">a</h3>
            <span class="item-comment">
                b
            </span>
            <h3 class="item-my-comment__title">商品へのコメント</h3>
            <form action="" method="post" class="item-my-comment__form">
                <textarea name="comment" class="item-my-comment"></textarea>
                <button type="submit" class="item-my-comment__button">コメントを送信する</button>
            </form>
        </div>
    </div>
@endsection