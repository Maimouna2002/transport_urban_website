<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
  protected $fillable = ['name', 'status'];

    public function itineraries()
    {
        return $this->belongsToMany(Itinerary::class);
    }
}
