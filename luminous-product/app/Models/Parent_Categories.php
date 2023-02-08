<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_Categories extends Model
{
    protected $table= 'marketplace_parent_categories';

    protected $guarded = ['id', 'created_at','updated_at'];
}
