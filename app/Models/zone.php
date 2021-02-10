<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
    use HasFactory;
    protected $table='ts_zones';
    protected static $instance = null;

    public static function getInstance()
    {
        if (null == static::$instance) {
            static::$instance = new Zone();
        }

        return static::$instance;
    }
}
