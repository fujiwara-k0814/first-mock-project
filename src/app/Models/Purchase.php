<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'delivery_address_id',
        'payment_method'
    ];

    public function deliveryAddress(){
        return $this->belongsTo(DeliveryAddress::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    //ラベル化(支払い方法)
    public function getPaymentMethodLabelAttribute(){
        return [
            1 => 'コンビニ払い',
            2 => 'カード支払い'
        ][$this->payment_method];
    }
}
