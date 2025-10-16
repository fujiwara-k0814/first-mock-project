@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile__content">
    <div class="profile__heading">
        <h1 class="profile__title">プロフィール設定</h1>
    </div>
    <form action="/mypage/profile" method="post" class="profile-form" enctype="multipart/form-data">
        @csrf
        <div class="profile-image__content">
            <div class="profile-image__inner">
                @if (session('profile_image_path'))
                    <img src="{{ asset(session('profile_image_path')) }}" alt="プロフィール画像" class="profile-image">
                @elseif ($user->image_path)
                    <img src="{{ asset($user->image_path) }}" alt="プロフィール画像" class="profile-image">
                @endif
            </div>
            <div class="profile-image-select__content">
                <label for="profile-image-select" class="profile-image__label">
                    <input type="file" name="image_path" id="profile-image-select" class="profile-image__select" onchange="this.form.submit()">
                    画像を選択する
                </label>
                <div class="profile-form__error">
                    @error('image_path')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-label">
                <span class="profile-form__label">ユーザー名</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input-inner">
                    <input type="text" name="name" class="login-form__input" value="{{ old('name', $user->name) }}">
                </div>
                <div class="profile-form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-label">
                <span class="profile-form__label">郵便番号</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input-inner">
                    <input type="text" name="postal_code" class="login-form__input" value="{{ old('postal_code', $user->postal_code) }}">
                </div>
                <div class="profile-form__error">
                    @error('postal_code')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-label">
                <span class="profile-form__label">住所</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input-inner">
                    <input type="text" name="address" class="login-form__input" value="{{ old('address', $user->address) }}">
                </div>
                <div class="profile-form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="profile-form__group-label">
                <span class="profile-form__label">建物名</span>
            </div>
            <div class="profile-form__group-content">
                <div class="profile-form__input-inner">
                    <input type="text" name="building" class="login-form__input" value="{{ old('building', $user->building) }}">
                </div>
                <div class="profile-form__error">
                    @error('building')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <input type="hidden" name="image_path" value="{{ session('profile_image_path') }}">
        <button type="submit" class="profile-form__button" name="action" value="save">更新する</button>
    </form>
</div>
@endsection