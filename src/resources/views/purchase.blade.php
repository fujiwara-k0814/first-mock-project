@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase__content">
    <div class="purchase-item__content">
        <div class="item___content">
            <div class="item-image__inner">
                <img src="{{ asset($item->image_path) }}" alt="商品画像">
            </div>
            <div class="item__heading">
                <h1 class="item-name">{{ $item->name }}</h1>
                <div class="item-price__content">
                    <span class="yen-mark">¥</span>
                    <span class="item-price">{{ number_format($item->price) }}</span>
                </div>
            </div>
        </div>
        <div class="item-payment__content">
            <div class="item-payment__label-content">
                <span class="item-payment__label">支払い方法</span>
            </div>
            <div class="item-payment__select-content">
                <form action="/purchase/{{ $item->id }}/payment" method="post">
                    @csrf
                    <select name="payment" class="item-payment__select" onchange="this.form.submit()">
                        <option value="" hidden>選択してください</option>
                        <option value="1"{{ session('payment') == 1 ? 'selected' : '' }}>コンビニ払い</option>
                        <option value="2"{{ session('payment') == 2 ? 'selected' : '' }}>カード支払い</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="item-delivery__content">
            <div class="item-delivery__label__content">
                <span class="item-delivery__label">配送先</span>
                <a href="/purchase/address/{{ $item->id }}" class="item-delivery__change">変更する</a>
            </div>
            <div class="item-delivery__content">
                <div class="delivery-postal-code__content">
                    <span class="postal-mark">〒</span>
                    <span class="postal-code">{{ $deliveryAddress->postal_code }}</span>
                </div>
                <span class="delivery-address">{{ $deliveryAddress->address }}</span>
                <span class="delivery-building">{{ $deliveryAddress->building }}</span>
            </div>
        </div>
    </div>
    <div class="purchase-payment__content">
        <table class="payment-table">
            <tr>
                <th>商品代金</th>
                <td>{{ $item->price }}</td>
            </tr>
            <tr>
                <th>支払い方法</th>
                @php
                    const PAYMENT_LABEL = [1 => 'コンビニ払い', 2 => 'カード支払い'];
                @endphp
                <td>{{ PAYMENT_LABEL[session('payment')] ?? '' }}</td>
            </tr>
        </table>
        <form action="/purchase/{{ $item->id }}" method="post" class="purchase-form">
            @csrf
            <input type="hidden" name="delivery_address_id" value="{{ $deliveryAddress->id }}">
            <button type="submit" class="purchase-form__button">購入する</button>
        </form>
    </div>
</div>
@endsection