<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coloring extends Model
{
    use HasFactory;
    // biar gapake fillable, ini artinya cuma id doang yg gaboleh di masukin mass assigment
    protected $guarded = ['id'];

    // Satu coloring bisa untuk banyak id booking
    public function booking_color()
    {
        //relasi one to many
        return $this->hasMany(booking::class);
    }
}
