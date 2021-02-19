<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'clients_id';
    protected $table = 'ts_clients';
    public $timestamps = false;

    public function locations()
    {
        return $this->belongsToMany(location::class,'ts_client_location','client_id','location_id');
    }

    public function campaign()
    {
        return $this->belongsToMany(Campaign::class,'ts_client_campaign','client_id','campaign_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class,'ts_category_client');
    }
}
