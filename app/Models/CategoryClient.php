<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryClient extends Model
{
    use HasFactory;
    protected $table='ts_category_client';
    public $timestamps = false;
}
