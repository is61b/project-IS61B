<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    public function jurusans(): HasOne
    {
        return $this->hasOne(Jurusan::class, 'id', 'jurusans_id');
    }
}
