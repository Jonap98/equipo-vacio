<?php

namespace App\Models\empaques;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empaques extends Model
{
    use HasFactory;
    protected $table = 'ev_numeros_empaque';
    protected $fillable = [
        'id',
        'numero_de_parte',
        'descripcion',
        'standar_pack'
    ];
}
