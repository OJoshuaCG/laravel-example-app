<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'edad',
    ];

    public function mascotas(){
        return $this->hasMany(Mascota::class);
    }

    public function perfil(){
        return $this->hasOne(Perfil::class);
    }

    public function trabajos(){
        return $this->belongsToMany(Trabajo::class)
            ->withTimestamps();
    }
}
