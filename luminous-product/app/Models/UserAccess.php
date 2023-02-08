<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    protected $table= 'marketplace_user_accesses';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $casts = [
        'accessable_categories' => 'array'
    ];
}
