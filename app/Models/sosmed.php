<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sosmed extends Model
{
    use HasFactory;
    protected $table = 'sosmed';

    protected $fillable = [
        'nama',
        'link',
        'siswa_id'
    ];
    public function siswa(){
       return $this->belongsTo(siswa::class);
    }
}
