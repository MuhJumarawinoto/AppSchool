<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nama',
        'wali_kelas',
        'alamat',
        'telepon',
    ];

    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn ($foto) => asset('/storage/guru/' . $foto),
        );
    }
}
