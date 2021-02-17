<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $primaryKey = 'location_id';
    protected $table = 'ts_locations';

    public function client()
    {
        return $this->belongsToMany(Client::class,'ts_client_location');
    }
}
