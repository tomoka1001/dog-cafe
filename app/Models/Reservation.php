<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $table = 'reservations'; // テーブル名を明示（必要なら）

    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'phone',
        'people',
        'reserved_date',
        'reserved_time',
        'body',
    ];
}
