@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
    <div class="item-detail__content">
        <div class="item-image__content">
            <img src="{{ asset($item->image_path) }}" alt="商品画像" class="item-image">
        </div>
        <div class="item-information__content">
            <div class="item-main__content">
                <div class="item-main__heading">
                    <h1 class="item-name">{{ $item->name }}</h1>
                </div>
                <div class="item-brand__content">
                    <span class="item-brand">{{ $item->brand }}</span>
                </div>
                <div class="item-price__content">
                    <span class="item-price">{{ $item->price }} (税込)</span>
                </div>
                <div class="item-icon__content">
                    <div class="item-icon__group">
                        <div class="item-icon__inner">
                            <form action="" method="post"></form>
                            <img src="/images/star_icon.svg" alt="いいね画像" class="item__icon">
                        </div>
                        <div class="item-count__content">
                            <span class="item__count">{{ $item->likes_count }}</span>
                        </div>
                    </div>
                    <div class="item-icon__group">
                        <div class="item-icon__inner">
                            <img src="/images/speech_balloon_icon.svg" alt="コメント画像" class="item__icon">
                        </div>
                        <div class="item-count__content">
                            <span class="item__count">{{ $item->comments_count }}</span>
                        </div>
                    </div>
                </div>
                <a href="/purchase/{{ $item->id }}" class="item__purchase-link">購入手続きへ</a>
            </div>
            <div class="item-description__content">
                <div class="item-description__heading">
                    <h2 class="item-description__title">商品説明</h2>
                </div>
                <div class="item-description__content">
                    <span class="item-description">{{ $item->description }}</span>
                </div>
            </div>
            <div class="item-information__content">
                <div class="item-information__heading">
                    <h2 class="item-information__title">商品の情報</h2>
                </div>
                <div class="item-information__category">
                    <div class="item-category__label-content">
                        <h3 class="item-category__label">カテゴリー</h3>
                    </div>
                    <div class="item-category__content">
                        @foreach ($item->categories as $category)
                            <span class="item-category">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="item-information__condition">
                    <div class="item-condition__label-content">
                        <h3 class="item-condition__label">商品の状態</h3>
                    </div>
                    <div class="item-condition__content">
                        <span class="item-condition">{{ $item->condition->name }}</span>
                    </div>
                </div>
            </div>
            <div class="item-comment__content">
                <div class="item-comment__heading">
                    <h2 class="item-comment__title">コメント({{$item->comments_count}})</h2>
                </div>
                <div class="item-comment__user-content">
                    @if ($item->comments_count > 0)
                        @foreach ($comments as $comment)
                            <div class="item-comment__user-wrapper">
                                <div class="comment-user__image-inner">
                                    <img src="{{ asset($comment->user->image_path) }}" alt="プロフィール画像" class="comment-user__image">
                                </div>
                                <div class="comment-user__name-content">
                                    <h3 class="comment-user__name">{{ $comment->user->name }}</h3>
                                </div>
                            </div>
                            <div class="comment-detail">
                                <span class="item-comment">{{ $comment->body }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="item-comment-form__content">
                <div class="item-comment-form__heading">
                    <h3 class="item-comment-form__title">商品へのコメント</h3>
                </div>
                <form action="/item/{{ $item->id }}/comment" method="post" class="item-comment-form">
                    @csrf
                    <textarea name="comment" class="item-comment"></textarea>
                    @if (Auth::user())
                        <button type="submit" class="item-comment-form__button">コメントを送信する</button>
                    @else
                        <button type="button" class="item-comment-form__button">コメントを送信する</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection