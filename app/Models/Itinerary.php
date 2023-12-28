<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = ['departure_point', 'arrival_point'];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
    public function stops()
    {
        return $this->belongsToMany(Stop::class);
    }
}
