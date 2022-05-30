<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'reservation_id',
        'room_id',
        'reservation_date',
    ];
}
