<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice',
        'midtrans_order_id',
        'room_id',
        'check_in',
        'check_out',
        'user_id',
        'adult',
        'child',
        'total',
        'status',
        'proof',
    ];
}
