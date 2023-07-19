<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Satu service bisa untuk banyak id booking
class Service extends Model
{
    use HasFactory;
    // biar gapake fillable, ini artinya cuma id doang yg gaboleh di masukin mass assigment
    protected $guarded = ['id'];
    // Relasi dari database booking dan service
    public function booking_service()
    {
        //relasi one to many
        return $this->hasMany(Service::class);
    }
}
