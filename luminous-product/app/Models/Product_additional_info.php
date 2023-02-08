<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_additional_info extends Model
{
    protected $table= 'mp_product_additional_info';

    protected $guarded = ['id', 'created_at','updated_at'];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
