@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="address__content">
    <div class="address__heading">
        <h1 class="address__title">住所の変更</h1>
    </div>
    <div class="address-form__content">
        <form action="/purchase/address/{{ $item->id }}" method="post" class="address-form">
            @csrf
            <div class="address-form__group">
                <div class="address-form__group-title">
                    <span class="address-form__title">郵便番号</span>
                </div>
                <div class="address-form__group-content">
                    <div class="address-form__input-inner">
                        <input type="text" name="postal_code" class="address-form__input" value="{{ $deliveryAddress->postal_code }}">
                    </div>
                    <div class="address-form__error">
                        @error('postal_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="address-form__group">
                <div class="address-form__group-title">
                    <span class="address-form__title">住所</span>
                </div>
                <div class="address-form__group-content">
                    <div class="address-form__input-inner">
                        <input type="text" name="address" class="address-form__input" value="{{ $deliveryAddress->address }}">
                    </div>
                    <div class="address-form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="address-form__group">
                <div class="address-form__group-title">
                    <span class="address-form__title">建物名</span>
                </div>
                <div class="address-form__group-content">
                    <div class="address-form__input-inner">
                        <input type="text" name="building" class="address-form__input" value="{{ $deliveryAddress->building }}">
                    </div>
                    <div class="address-form__error">
                        @error('building')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="address-form__button">更新する</button>
        </form>
    </div>
</div>
@endsection