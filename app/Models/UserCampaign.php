<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCampaign extends Model
{
    use HasFactory;
    protected $table='ts_client_campaign';
    public $timestamps = false;
}
