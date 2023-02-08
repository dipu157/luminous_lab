<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= 'marketplace_products';

    protected $guarded = ['id', 'created_at','updated_at'];

    public function products_addition_info()
    {
        return $this->hasOne(Product_additional_info::class,'product_id','id')->withDefault();
    }

    public function product_brand()
    {
        return $this->belongsTo(Product_brand::class,'brand','id')->withDefault();
    }
}
