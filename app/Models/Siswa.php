<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Kalau nama tabel di database bukan jamak "siswas" (default Laravel), kita tentukan manual
    protected $table = 'siswa';

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'nama',
        'nis',
        'jenis_kelamin',
        'alamat'
    ];

    // Relasi: Satu siswa bisa punya banyak data kas
    public function kas()
    {
        return $this->hasMany(Kas::class, 'siswa_id');
    }
}
