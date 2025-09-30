<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'brand',
        'price',
        'description',
        'condition'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function purchase(){
        return $this->hasOne(Purchase::class);
    }

    public function sell(){
        return $this->hasOne(Sell::class);
    }



    //ラベル化(商品状態)
    public function getConditionLabelAttribute(){
        return [
            1 => '良好',
            2 => '目立った傷や汚れなし',
            3 => 'やや傷や汚れあり',
            4 => '状態が悪い'
        ][$this->condition];
    }
}
