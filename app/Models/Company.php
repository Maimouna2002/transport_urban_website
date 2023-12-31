<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'localisation', 'contact', 'status'];

    public function itineraries()
    {
        return $this->belongsToMany(Itinerary::class);
    }
}
