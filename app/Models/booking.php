<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    // biar gapake fillable, ini artinya cuma id doang yg gaboleh di masukin mass assigment
    protected $guarded = ['id'];

    // Satu booking id hanya bisa memilih satu coloring
    public function foreign_color()
    {
        //relasi one to one
        //namanya jadi author, dan mengambil user id
        return $this->belongsTo(Coloring::class, 'coloring_id');
    }
    // Satu booking id hanya bisa memilih satu service
    public function foreign_service()
    {
        //relasi one to one
        //namanya jadi author, dan mengambil user id
        return $this->belongsTo(Service::class, 'service_id');
    }
}
