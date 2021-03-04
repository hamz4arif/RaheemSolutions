<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = 'type_id';
    protected $table='ts_type';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsToMany(Category::class,'ts_category_type');
    }

    public function item()
    {
        return $this->belongsToMany(Item::class,'ts_type_item','type_id','item_id');
    }
}
