<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $table = 'socio';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'idioma'
    ];
}
