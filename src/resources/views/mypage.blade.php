@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage__content">
    <div class="mypage-image__content">
        <div class="mypage-image__inner">
            <img src="{{ asset($user->image_path) }}" alt="プロフィール画像">
        </div>
        <h1 class="mypage-name">{{ $user->name }}</h1>
        <a href="/mypage/profile" class="mypage__edit-link">プロフィールを編集</a>
    </div>
    <div class="mypage__select-tab__content">
        <a href="mypage?page=sell" class="mypage__sold-item-tab">出品した商品</a>
        <a href="mypage?page=buy" class="mypage__pachased-item-tab">購入した商品</a>
    </div>
    @foreach ($items as $item)
        @if ($item)
            <a href="/item/{{ $item->id }}" class="item-detail__link">
                <div class="item-card">
                    <div class="item-image__content">
                        <img src="{{ asset($item->image_path) }}" alt="商品画像" class="item-image">
                    </div>
                    <span class="item-name">{{ $item->name }}</span>
                </div>
            </a>
        @endif
    @endforeach
</div>
@endsection