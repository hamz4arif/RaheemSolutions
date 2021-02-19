<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;
    protected $table='ts_sla';
    public $timestamps = false;
    
    public function location()
    {
        return $this->belongsToMany(location::class,'ts_sla_locations','sla_id','location_id');
    }
}
