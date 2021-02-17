<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlaLocation extends Model
{
    use HasFactory;
    protected $table='ts_sla_locations';
    public $timestamps = false;
}
