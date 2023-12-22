<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable=[
        'product_id',
        'order_id',
        'price',
        'quantity',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
