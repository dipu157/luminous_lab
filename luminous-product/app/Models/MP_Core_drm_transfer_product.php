<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MP_Core_drm_transfer_product extends Model
{
    protected $table= 'mp_core_drm_transfer_products';

    protected $guarded = ['id', 'created_at','updated_at'];
}
