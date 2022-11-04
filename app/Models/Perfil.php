<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'email',
    // ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
