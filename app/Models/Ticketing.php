<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    use HasFactory;
    protected $fillable = [
        'tick_date','activity_id','no_of_ticks','nid',
    ];

    public function activity() {
        return $this->belongsTo('App\Models\Activity');
    }
}
