<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'campaign_id';
    protected $table = 'ts_campaign';
    public $timestamps = false;

    
    public function client()
    {
        return $this->belongsToMany(Client::class,'ts_client_campaign');
    }
}
