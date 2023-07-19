<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// fungsi Laravel untuk menyambungkan database hairartist
class HairArtist extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
