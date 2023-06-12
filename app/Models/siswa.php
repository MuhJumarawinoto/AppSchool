<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'email',
        'agama',
        'kelas',
        'jurusan',
        'foto',
        'catatan',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function sosmed(){
        return $this->hasMany(sosmed::class);
    }
}
