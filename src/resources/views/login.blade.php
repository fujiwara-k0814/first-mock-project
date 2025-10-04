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
                <div class="login-form__group-title">
                    <span class="login-form__title">メールアドレス</span>
                </div>
                <div class="login-form__group-content">
                    <div class="login-form__input">
                        <input type="text" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="login-form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="login-form__group">
                <div class="login-form__group-title">
                    <span class="login-form__title">パスワード</span>
                </div>
                <div class="login-form__group-content">
                    <div class="login-form__input">
                        <input type="password" name="password">
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
        <a href="/register" class="reister-link__button">会員登録はこちら</a>
    </div>
</div>
@endsection