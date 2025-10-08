@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <div class="register__heading">
        <h1 class="register__title">会員登録</h1>
    </div>
    <div class="register-form__content">
        <form action="" method="post" class="register-form">
            @csrf
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <span class="register-form__label">ユーザー名</span>
                </div>
                <div class="register-form__group-content">
                    <div class="register-form__input-inner">
                        <input type="text" name="name" class="login-form__input" value="{{ old('name') }}">
                    </div>
                    <div class="register-form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <span class="register-form__label">メールアドレス</span>
                </div>
                <div class="register-form__group-content">
                    <div class="register-form__input-inner">
                        <input type="text" name="email" class="login-form__input" value="{{ old('email') }}">
                    </div>
                    <div class="register-form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <span class="register-form__label">パスワード</span>
                </div>
                <div class="register-form__group-content">
                    <div class="register-form__input-inner">
                        <input type="password" name="password" class="login-form__input" value="{{ old('password') }}">
                    </div>
                    <div class="register-form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <span class="register-form__label">確認用パスワード</span>
                </div>
                <div class="register-form__group-content">
                    <div class="register-form__input-inner">
                        <input type="password" name="password_confirmation" class="login-form__input" value="{{ old('password_confirmation') }}">
                    </div>
                    <div class="register-form__error">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="register-form__button">登録する</button>
        </form>
    </div>
</div>
@endsection