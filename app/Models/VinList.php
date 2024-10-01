<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VinList extends Model
{
    use HasFactory;

    protected $guarded = array();

    public function userVins()
    {
        return $this->hasMany(UserVins::class, 'vin_id');
    }
}
