@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__content">
    <div class="login__heading">
        <h1 class="login__title">ログイン</h1>
    </div>
    <div class="login-form__content">
        <form action="/login" method="post" class="login-form">
            @csrf
            <div class="login-form__group">
                <div class="login-form__group-label">
                    <span class="login-form__label">メールアドレス</span>
                </div>
                <div class="login-form__group-content">
                    <div class="login-form__input-inner">
                        <input type="text" name="email" class="login-form__input" value="{{ old('email') }}">
                    </div>
                    <div class="login-form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="login-form__group">
                <div class="login-form__group-label">
                    <span class="login-form__label">パスワード</span>
                </div>
                <div class="login-form__group-content">
                    <div class="login-form__input-inner">
                        <input type="password" name="password" class="login-form__input">
                    </div>
                    <div class="login-form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="login-form__button">ログインする</button>
        </form>
        <div class="register-link__button-content">
            <a href="/register" class="register-link__button">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection