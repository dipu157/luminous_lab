<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table= 'marketplace_categories';

    protected $guarded = ['id', 'created_at','updated_at'];
}
