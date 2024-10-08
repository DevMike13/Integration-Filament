<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeatMap extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'weight', 'full_address', 'hazard_type'];
}
