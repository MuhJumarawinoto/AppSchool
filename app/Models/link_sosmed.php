<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class link_sosmed extends Model
{
    use HasFactory;
    public function sosmed(){
       return $this->belongsTo(sosmed::class);
    }
}
