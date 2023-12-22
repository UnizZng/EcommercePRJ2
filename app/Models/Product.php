<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable=[
        'name',
        'quantity',
        'price',
        'image',
        'description',
        'cpu',
        'ram',
        'storage',
        'gpu',
        'screen',
        'os',
        'ports',
        'battery',
        'brand_id',
        'category_id',
    ];
    public function order(){
        return $this->belongsToMany(Order::class);
    }
}
