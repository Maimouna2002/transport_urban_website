<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['departure_time', 'arrival_time'];

    public function itineraries()
    {
        return $this->belongsToMany(Itinerary::class);
    }
}
