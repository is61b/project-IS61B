<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'mahasiswa';
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';

    public function jurusans(): HasOne
    {
        return $this->hasOne(Jurusan::class, 'id', 'jurusans_id');
    }
}
