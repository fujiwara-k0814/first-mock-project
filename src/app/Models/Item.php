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

    public function categoryTags(){
        return $this->hasMany(CategoryTag::class);
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
}
