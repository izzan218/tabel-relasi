<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulanKas extends Model
{
    use HasFactory;

     protected $table = 'bulan_kas';
    protected $fillable = ['bulan', 'jumlah_target'];
    
}
