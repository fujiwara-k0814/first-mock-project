@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile__content">
    <div class="profile__heading">
        <h1 class="header__title">プロフィール設定</h1>
    </div>
    <div class="profile-image-form__content">
        <div class="profile-image-form__inner">
            @php
                $profileImage = session('profile_image')
            @endphp
            @if ($profileImage)
                <img src="{{ asset('storage/' . $profileImage) }}" alt="プロフィール画像" class="profile-image">
            @elseif ($user->image_path)
                <img src="{{ asset('storage/' . $user->image_path) }}" alt="プロフィール画像" class="profile-image">
            @endif
        </div>
        <form action="/mypage/profile/image" method="post" class="profile-image-form" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" class="profile-image-form__select" onchange="this.form.submit()">
        </form>
    </div>
    <form action="" method="post" class="profile-form">
        @csrf
        <div class="profile-form__group">
            <div class="profile-form__group-title">
                <span class="profile-form__title">ユーザー名</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="profile-form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-title">
                <span class="profile-form__title">郵便番号</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input">
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}">
                </div>
                <div class="profile-form__error">
                    @error('postal_code')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-title">
                <span class="profile-form__title">住所</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input">
                    <input type="text" name="address" value="{{ old('address') }}">
                </div>
                <div class="profile-form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-title">
                <span class="profile-form__title">建物名</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input">
                    <input type="text" name="building" value="{{ old('building') }}">
                </div>
                <div class="profile-form__error">
                    @error('building')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="profile-form__button">更新する</button>
    </form>
</div>
@endsection