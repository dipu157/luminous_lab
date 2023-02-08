<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_brand extends Model
{
    protected $table= 'marketplace_product_brand';

    protected $guarded = ['id', 'created_at','updated_at'];
}
