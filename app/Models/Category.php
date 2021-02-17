<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';
    protected $table = 'ts_category';

    public function client()
    {
        return $this->belongsToMany(Client::class,'ts_category_client','category_id','client_id');
    }

    public function type()
    {
        return $this->belongsToMany(Type::class,'ts_category_type','category_id','type_id');
    }
}
