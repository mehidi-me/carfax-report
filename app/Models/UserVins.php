<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVins extends Model
{
    use HasFactory;

    protected $guarded = array();

    public function vin()
    {
        return $this->belongsTo(VinList::class, 'vin_id');
    }
}
